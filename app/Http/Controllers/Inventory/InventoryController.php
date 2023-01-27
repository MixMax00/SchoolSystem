<?php

namespace App\Http\Controllers\Inventory;

use App\Models\Teacher;
use App\Models\Inventory;
use App\Models\Librarian;
use App\Models\Accountant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LostInventory;
use Illuminate\Support\Carbon;
use App\Models\SupplierInvoice;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\InventoryIdentity;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class InventoryController extends Controller
{
    public function index()
    {
        return view('Backend.Inventory.Inventory.index');
    }

    public function create()
    {
        return view('Backend.Inventory.Inventory.create');
    }

    public function store(Request $request)
    {

        $total_price = $request->quantity * $request->price;

        if ($request->file('image')) {
    		$width = 417;
    		$height = 458;
    		$directory = "assets/backend/teacher/";
    		$db_url = image_upload($request->image,$directory,$width,$height);
    		Inventory::create([
                "name"         => $request->name,
                "category_id"  => $request->category_id,
                "supplier_id"  => $request->supplier_id,
                "price"        => $request->price,
                "quantity"     => $request->quantity,
                "total_price"  => $total_price,
                "total_quantity"  => $request->quantity,
                "image"        => $db_url,
                "description"  => $request->description,
			]);

    	}else{
    		Inventory::create([
                "name"         => $request->name,
                "category_id"  => $request->category_id,
                "supplier_id"  => $request->supplier_id,
                "price"        => $request->price,
                "quantity"     => $request->quantity,
                "total_quantity"  => $request->quantity,
                "total_price"  => $total_price,
                "description"  => $request->description,
			]);
    	}

        Toastr::success('Inventory Added.', 'Success', ["positionClass" => "toast-top-right"]);

        return redirect()->route('admin.inventory.index');
    }


    public function identity()
    {
        return view('Backend.Inventory.Inventory.identity');
    }

    public function getProduct(Request $request)
    {
           $inventories = Inventory::where('category_id',$request->category_id)->get();

            foreach ($inventories as $inventory) {
                echo $output = '<option value="'.$inventory->id.'">'.$inventory->name.'</option>';
            }

    }

    public function checkQuantity(Request $request)
    {
        $invent = Inventory::find($request->productId);
        // return $invent->quantity;

        if($invent->quantity < $request->quantity){
            return "0";
        }else{
            return "1";
        }
    }

    public function identityStore(Request $request)
    {
    //    return $request->all();

        $request->validate([
            "product_id"    => "required",
            "identity_name"    => "required",
        ]);

        $inventory = Inventory::find($request->product_id);



        InventoryIdentity::create([
            "category_Id"    => $request->category_id,
            "product_id"     => $request->product_id,
            "identity_name"  => $request->identity_name,
            "slug"           => Str::slug($request->identity_name."_".$request->product_id),
            "price"          => $inventory->price,
            "starting_date"  => $request->starting_date,
            "quantity"       => $request->quantity,
        ]);

        $invent = Inventory::find($request->product_id);

        $current_quantity = ($invent->quantity - $request->quantity);
        $invent->quantity = $current_quantity;
        $invent->save();

        Toastr::success('User Identify.', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }


    public function allidentity(Request $request)
    {
        if($request->search){
            $identities = InventoryIdentity::where('identity_name', 'Like',  "%$request->search%")->get();
            return view('Backend.Inventory.Inventory.allidentity', compact('identities'));
        }else{
            $identities = InventoryIdentity::all();
            return view('Backend.Inventory.Inventory.allidentity', compact('identities'));
        }

    }

    public function rejectList()
    {
        return view('Backend.Inventory.Inventory.rejectlist');
    }

    public function lostBy(Request $request)
    {

        LostInventory::create([
            "product_id"   => $request->product_id,
            "identity_name" => $request->identity_name,
            "price"        => $request->price,
            "qty"          => $request->qty,
            "created_at"   => Carbon::now(),
        ]);

        $lostProduct = InventoryIdentity::find($request->id);
        $lostProduct->quantity = $lostProduct->quantity - $request->qty;
        $lostProduct->save();

        // $lostByInventory = Inventory::find($request->product_id);
        // $lostByInventory->total_quantity = $lostByInventory->total_quantity - $request->qty;
        // $lostByInventory->save();





        Toastr::success('Lost Product Added.', 'Success', ["positionClass" => "toast-top-right"]);
        return back();


    }

    public function editIdentity($id)
    {
        $edit = InventoryIdentity::find($id);
        return view('Backend.Inventory.Inventory.edit_identity', compact('edit'));
    }

    public function stockStore()
    {
        return view('Backend.Inventory.Stock.store_stock');
    }

    public function identityUpdate (Request $request)
    {

        $check_slug = Str::slug($request->identity_name."_".$request->product_id);
        $check = InventoryIdentity::where('slug',$check_slug)->first();

        if($check){
            if($request->exists('product_id')){

                $inventory = InventoryIdentity::find($request->id);
                if($request->quantity > $inventory->quantity){
                    $max = $request->quantity - $inventory->quantity;
                    $invent = Inventory::find($request->product_id);
                    $current_quantity = ($invent->quantity - $max);
                    $invent->quantity = $current_quantity;
                    $invent->save();

                    InventoryIdentity::where('id',$request->id)->update([
                        "category_Id"    => $request->category_id,
                        "product_id"     => $request->product_id,
                        "quantity"       => $request->quantity,
                        "updated_at"     => Carbon::now(),
                    ]);
                    Toastr::success('Update Identify.', 'Success', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.inventory.allidentity');
                }else{
                    $cq = ($inventory->quantity - $request->quantity);
                    $invent = Inventory::find($request->product_id);
                    $current_quantity = ($invent->quantity + $cq);
                    $invent->quantity = $current_quantity;
                    $invent->save();
                    InventoryIdentity::where('id',$request->id)->update([
                        "category_Id"    => $request->category_id,
                        "product_id"     => $request->product_id,
                        "quantity"       => $request->quantity,
                        "updated_at"     => Carbon::now(),
                    ]);

                    Toastr::success('Update Identify.', 'Success', ["positionClass" => "toast-top-right"]);
                    return redirect()->route('admin.inventory.allidentity');
                }


            }else{
                InventoryIdentity::where('id',$request->id)->update([
                    "category_Id"    => $request->category_id,
                    "product_id"     => $request->product_id,
                    "quantity"       => $request->quantity,
                    "updated_at"     => Carbon::now(),
                ]);

                $invent = Inventory::find($request->product_id);

                $current_quantity = ($invent->quantity - $request->quantity);
                $invent->quantity = $current_quantity;
                $invent->save();

                Toastr::success('Update Identify.', 'Success', ["positionClass" => "toast-top-right"]);
                return redirect()->route('admin.inventory.allidentity');
            }

        }else{
            InventoryIdentity::create([
                "category_Id"    => $request->category_id,
                "product_id"     => $request->product_id,
                "identity_name"  => $request->identity_name,
                "slug"           => Str::slug($request->identity_name."_".$request->product_id),
                "starting_date"  => $request->starting_date,
                "quantity"       => $request->quantity,
            ]);


            $inventIdentity = InventoryIdentity::find($request->id);

            $current_quantity = ($inventIdentity->quantity - $request->quantity);
            $inventIdentity->quantity = $current_quantity;
            $inventIdentity->save();

            Toastr::success('Transfer Success.', 'Success', ["positionClass" => "toast-top-right"]);
            return redirect()->route('admin.inventory.allidentity');
        }
    }


    public function invoice()
    {
        $invoices = DB::table('inventories')
                        ->join('invent_suppliers', 'inventories.supplier_id', '=', 'invent_suppliers.id')
                        ->selectRaw('inventories.*, invent_suppliers.name as supplier_name')
                        ->get();
        return view('Backend.Inventory.Invoice.invoice_list', compact('invoices'));
    }

    public function invoicePrint($id)
    {
        $data = SupplierInvoice::find($id);
        $pdf = Pdf::loadView('Backend.Inventory.Invoice.template',compact('data'));
        return $pdf->stream();
    }

    public function invoicePayment(Request $request)
    {


        $due = $request->total - $request->payment;

        SupplierInvoice::create([
            "product_id"   => $request->product_id,
            "total_price"  => $request->total,
            "payment"      => $request->payment,
            "due"          => $due,
            "type"         => $request->payment_type,
            "created_at"   => Carbon::now(),
        ]);

        Toastr::success('Payment Successfully.', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }

    public function invoiceDuePayment(Request $request)
    {
        $payment = $request->privious_payment + $request->due_payment;
        $due = $request->total - $payment;

        SupplierInvoice::where('id', $request->invoice_id)->update([
            "payment"    => $payment,
            "due"        => $due,
            "type"       => $request->payment_type,
            "status"     => 0,
            "updated_at" => Carbon::now(),
        ]);

        Toastr::success('Due Payment Successfully.', 'Success', ["positionClass" => "toast-top-right"]);
        return back();
    }


    public function report()
    {
        return view('Backend.Inventory.Report.report');
    }

}
