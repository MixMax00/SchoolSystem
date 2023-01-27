<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierInvoice extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function invoice()
    {
        return $this->hasOne(Inventory::class, 'id','product_id');
    }
}
