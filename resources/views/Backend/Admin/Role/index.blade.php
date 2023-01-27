@extends('Backend.Admin.master')


@section('title')
    Manage Role
@endsection


@php($roles = \App\Models\Role::all())
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

<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">

            <div class="item-title">
                <h3 class="text-dark">Role Management</h3>
            </div>
            <div class="dropdown">
                @if(auth()->user()->hasPermission('app.roles.create'))
                {{-- <a href="{{ route('role.create') }}" class="p-3"><i class="fas fs-5 fa-plus"></i></a> --}}
                @else
                {{-- <a href="{{ route('role.create') }}" class="p-3"><i class="fas fs-5 fa-plus"></i></a> --}}
                @endif
            </div>
        </div>
        <div class="table-responsive">
            <table id="table_id" class="table display data-table text-nowrap">
                <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">#</label>
                            </div>
                        </th>
                        <th>Name</th>
                        <th>Permission</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input">
                                    <label class="form-check-label">{{ $loop->index +1 }}</label>
                                </div>
                            </td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @if ($role->permission->count() > 0)
                                    ({{ $role->permission->count() }}) <span>Permission found</span>
                                @else
                                    <span class="text-warning">No Permission Found.</span>
                                @endif
                            </td>
                            <td>{{ $role->created_at->format('d-M-y') }}</td>
                            <td>
                                <a href="{{ route('role.edit',["id"=>$role->id]) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                @if ($role->deletable)
                                <button class="btn btn-danger delete_btn" value="{{$role->id}}" id="delete" ><i class="fas fa-trash text-white"></i></button>
                                @else

                                @endif

                            </td>
                        </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection


@section('js')

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
                                url:"role/delete/"+emp_id,
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
