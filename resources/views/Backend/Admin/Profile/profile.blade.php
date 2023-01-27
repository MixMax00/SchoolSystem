@extends('Backend.Admin.master')
@section('title')
    Profile
@endsection

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
                    Profile
                </div>
                <div class="card-body">
                    <form>
                       <div class="row">
                           <div class="col-12">
                               <div class="form-group">
                                   <label for="name" class="text-muted">Name</label>
                                   <input type="text" name="name" disabled value="{{ $profile->name }}" class="form-control text-muted">
                               </div>
                               <div class="form-group">
                                   <label for="name" class="text-muted">School Name</label>
                                   <input type="text" name="school_id" disabled value="School Name" class="form-control text-muted">
                               </div>
                               <div class="form-group">
                                   <label for="name" class="text-muted">Domain</label>
                                   <input type="text" name="domain" disabled value="Domain" class="form-control text-muted">
                               </div>
                              
                           </div>
                       </div>
                       
                    </form>
                </div>
            </div>
       

@endsection



@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        if($('#contact_form'). length > 0){
            $('#contact_form').validate({
                rules: {
                    headings: {
                        required:true,
                    },short_description:{
                        required:true,
                    },phone:{
                        required:true,
                    },image:{
                        required:true,
                    },email:{
                        required:true,
                        email:true,
                    }
                },
                messages:{
                    headings: {
                        required:"Please enter Your headings",
                    },short_description:{
                        required:"Please enter short description",
                    },phone:{
                        required:"please enter mobile number",
                    },image:{
                        required:"Please select image",
                    },email:{
                        required:"Please enter email",
                        email:"Please enter a valid email",
                    }
                }
            })
        }


    </script>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function (){

            $(document).on('click', '.delete_btn', function (e){
                e.preventDefault();
                let emp_id = $(this).val();



                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if(result){
                        if (result.isConfirmed) {
                            $.ajax({
                                type:"GET",
                                url:"banner/delete/"+emp_id,
                                success:function (response){
                                    if(response.status == 200) {
                                        window.location.reload()
                                    }
                                }
                            })
                        }
                    }
                })


            });



        })
    </script>



@endsection
