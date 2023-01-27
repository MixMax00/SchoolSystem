@extends('Backend.Admin.master')

@section('title')
   Edit Identity
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
             Edit Identity
        </div>
        <div class="card-body">
            <form id="supplier" method="post" action="{{ route('admin.identity.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">Category</label>
                    <input type="hidden" name="id" value="{{ $edit->id }}">
                    <input type="hidden" name="category_id" value="{{ $edit->category_Id }}">
                    <input type="text" value="{{ $edit->category->category_name	 }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="hidden" name="product_id" id="productName" value="{{ $edit->product_id }}">
                    <input type="text" value="{{ $edit->products->name }}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="name"> Identity Name</label>
                    <input type="text" name="identity_name" value="{{ $edit->identity_name }}" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="name">Quantity</label>
                    <input type="text" name="quantity" id="quantity" value="{{ $edit->quantity }}" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-warning " value="Update Identity">
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
                            $("#quantity").css("background-color", "#f8f8f8");
                        }else{
                            $("#quantity").css("background-color", "#f8f8f8");
                        }

                    }
                });
            });
        });
   </script>




@endsection
