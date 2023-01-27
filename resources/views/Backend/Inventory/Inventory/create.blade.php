@extends('Backend.Admin.master')

@section('title')
   Add Product
@endsection

@php

    $inventories = \App\Models\Inventory::all();
    $categorirs = \App\Models\InventoryCategory::where('status', 1)->get();
    $supplieries = \App\Models\InventSupplier::where('status', 1)->get();
@endphp

@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>@yield('title')</h3>
        <ul>
            <li>
                <a href="{{route('admin.dashboard')}}">Home</a>
            </li>
            <li>@yield('title')</li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
    <div class="card">
        <div class="card-header">
             Add Product
            <a href="{{ route('admin.inventory.index') }}" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i><span>All Product</span></a>
        </div>
        <div class="card-body">
            <form id="supplier" method="post" action="{{ route('admin.inventory.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="category_name">Product Name</label>
                  <input type="text" name="name" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="name">Catrogry Name</label>
                    <select name="category_id" id="" class="form-control">
                        <option selected>--- select category --</option>
                        @foreach ($categorirs as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Supplier Name</label>
                    <select name="supplier_id" id="" class="form-control">
                        <option selected>--- select supplier --</option>
                        @foreach ($supplieries as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Qunatity</label>
                    <input type="text" name="quantity" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group mt-3">
                    <div class="image">
                        <img class="border" src="{{ asset('assets/backend/avatar/student_avatar.jpg') }}" id="output" width="100px" height="80px"/>
                    </div>
                </div>

               <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="image" id="" class="form-control" onchange="studentPhoto(event)" >
               </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning w-100" value="Add Product">
                </div>
            </form>
        </div>
    </div>
@endsection



@section('js')

    <script>
        var studentPhoto = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        if($('#supplier'). length > 0){
            $('#supplier').validate({
                rules: {
                    name: {
                        required:true,
                    },
                    category_id : {
                        required:true,
                    },
                    supplier_id : {
                        required: true,
                    },
                    quantity : {
                        required: true,
                    },
                    price : {
                        required: true,
                    },
                    image : {
                        required: true,
                    }

                },
                messages:{
                    name: {
                        required:"Please enter product name",
                    },
                    category_id: {
                        required:"Please select category Name",
                    },
                    supplier_id: {
                        required:"Please enter supplier name",
                    },
                    quantity: {
                        required:"Please enter quantity",
                    },
                    price: {
                        required:"Please enter price",
                    },
                    image: {
                        required:"Please enter product image",
                    }
                }
            })
        }


    </script>

@endsection
