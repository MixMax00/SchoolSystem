@extends('Backend.Admin.master')

@section('title')
   Add Identity
@endsection

@php
    $categories = \App\Models\InventoryCategory::where('status',1)->get();

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
             Add Identity
            <a href="{{ route('admin.inventory.index') }}" class="btn btn-primary float-right"><i class="fa fa-plus mr-2"></i><span>All Product</span></a>
        </div>
        <div class="card-body">
            <form id="supplier" method="post" action="{{ route('admin.identity.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Category</label>
                    <select name="category_id" id="categoryId" class="form-control">
                        <option selected>--- select category ---</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <select name="product_id" id="productName" class="form-control">
                        <option selected>--- select product --</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name"> Identity Name/ Room Name/ Room Number</label>
                    <input type="text" name="identity_name" id="" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">Quantity</label>
                    <input type="text" name="quantity" id="quantity" class="form-control">
                    <p id="errorQty" class="text-danger"></p>
                </div>
                <div class="form-group">
                    <label for="name">Stating Date</label>
                    <input type="date" name="starting_date" class="form-control">

                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning " value="Add Identity">
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


                },
                messages:{
                    name: {
                        required:"Please enter product name",
                    },

                }
            })
        }


    </script>


   <script>
       $(document).ready(function(){
            $('#categoryId').change(function(){
                let categoryId = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.identity.product') }}",
                    data:{
                        category_id : categoryId,
                    },
                    success:function(data) {
                        $("#productName").html(data);
                    }
                });
            });


       });

       $(document).ready(function(){
            $("#quantity").keydown(function(){


            });
            $("#quantity").keyup(function(){


                var productId = $("#productName").val();
                var quantity = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"POST",
                    url:"{{ route('admin.check.quantity') }}",
                    data:{
                        quantity : quantity,
                        productId : productId,
                    },
                    success:function(data) {
                        if(data == "0"){
                            $("#errorQty").text("Out Of Stock.");
                        }else{
                            $("#quantity").css("background-color", "#f8f8f8");
                        }

                    }
                });
            });
        });
   </script>




@endsection
