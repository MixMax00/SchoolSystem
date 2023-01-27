@extends('Backend.Admin.master')


@section('title')
    Email SMS
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
        Email SMS
    </div>
    <div class="card-body">
       <form action="{{ route('admin.smsEmail.store') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="">Send Email</label>
                <select name="type" class="form-control" id="">
                    <option selected>--- select type ---</option>
                    <option value="student">Students</option>
                    <option value="guardian">Guardians</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>
            <hr>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Message</label>
                <textarea name="message" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning btn-lg" value="Send Message">
            </div>
       </form>
    </div>
</div>

@endsection



@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
                            url:"delete/gradedelete/"+emp_id,
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

