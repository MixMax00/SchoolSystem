@extends('Backend.Admin.master')

@section('title')
    Role Manage
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

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-warning">
                <div class="card-title">
                    <h5 class="text-white">Role Manage</h5>
                </div>
            </div>
            <div class="card-body">
                <form class="" action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        <input type="text" id="name" name="name" value="" class="form-control"/>
                    </div>
                    <div class="py-3 text-center">
                        <p>Manage permission for roles</p>
                    </div>
                    <div class="py-3">
                        <div class="custom-control form-check">
                            <input type="checkbox" id="selectAll" class="form-control-input"/>
                            <label for="selectAll" class="custom-control-label">Select All</label>
                        </div>
                    </div>
                    @forelse ($modules->chunk(2) as $chunks)
                        <div class="form-group">
                            @foreach ($chunks as $module)
                                <div class="col-md-12">
                                    <h5>Module: {{ $module->name }}</h5>
                                    <div class="mb-3" style="margin-left: 50px; margin-top:30px;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="custom-control form-check mb-3 d-block">
                                                    <input type="checkbox" id="all-{{ $module->name }}" class="form-control-input"/>
                                                    <label for="all-{{ $module->name }}" class="custom-control-label">All {{ $module->name }} Permission</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @foreach ($module->permissions as $permission)
                                                <div class="custom-control form-check mb-3 d-block">
                                                    <input
                                                        type="checkbox"
                                                        id="permission-{{ $permission->id }}"
                                                        name="permission[]"
                                                        value="{{ $permission->id }}"
                                                        class="form-control-input"
                                                    />
                                                    <label for="permission-{{ $permission->id }}" class="custom-control-label">{{ $permission->name }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <div class="row">
                            <strong>No permission found.</strong>
                        </div>
                    @endforelse

                    <div class="form-group">
                        <input type="submit" class="btn btn-warning f-right" value="Save"/>
                    </div>
                </form>
            </div>
        </div>
    <div>
</div>



@endsection


@section('js')

<script>
    $(document).ready(function(){
        $("#selectAll").click(function(){
            if(this.checked){
                $(":checkbox").each(function(){
                    this.checked = true;
                });
            }else{
                $(":checkbox").each(function(){
                    this.checked = false;
                });
            }
        });

        $("#")
    });
</script>

@endsection
