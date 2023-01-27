@extends('Backend.Admin.master')

@section('title')
    Edit Role
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


<div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">

            <div class="item-title">
                <h3 class="text-dark">Role Edit</h3>
            </div>
        </div>
        <form class="" action="{{ route('role.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Role Name</label>
                <input type="hidden"  name="id" value="{{ $edit->id }}" class="form-control"/>
                <input type="text" id="name" name="name" value="{{ $edit->name }}" class="form-control"/>
            </div>
            <div class="py-3 text-center">
                <p>Manage permission for roles</p>
            </div>
            <div class="py-3">
                <div class="form-group form-check">
                    <input type="checkbox" id="selectAll" class="form-control-input"/>
                    <label for="selectAll" class="form-control-label">Select All</label>
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
                                        <div class="form-group form-check mb-3 d-block">
                                            <input
                                                type="checkbox"
                                                id="all-{{ $module->name }}"
                                                class="form-control-input"
                                            />
                                            <label for="all-{{ $module->name }}" class="form-control-label">All {{ $module->name }} Permission</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @foreach ($module->permissions as $permission)
                                        <div class="form-group form-check mb-3 d-block">
                                            <input
                                                type="checkbox"
                                                id="permission-{{ $permission->id }}"
                                                name="permission[]"
                                                value="{{ $permission->id }}"
                                                class="form-check-input"
                                                @foreach ($edit->permission as $editPermission)
                                                        {{ $permission->id ==  $editPermission->id ? 'checked' : ''}}
                                                @endforeach

                                            />
                                            <label for="permission-{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
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

            <div class="col-12 form-group mg-t-8">
                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
            </div>
        </form>
    </div>
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


    });
</script>

@endsection
