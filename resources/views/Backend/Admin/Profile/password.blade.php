@extends('Backend.Admin.master')

@section('title')
	Password Change
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
            Change Password
        </div>
        <div class="card-body">
            <form action="{{ route('change.password.save') }}" method="POST">
            	@csrf
               <div class="row">
                   <div class="col-12">
                       <div class="form-group">
                           <label for="name" class="text-muted">Password</label>
                           <input type="password" name="password" class="form-control text-muted @error('password') is-invalid @enderror" placeholder="12345678">
                           @error('password')
                              <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                       </div>
                       <div class="form-group">
                           <label for="name" class="text-muted">Re-type Password</label>
                           <input type="password" name="password_confirmation" class="form-control text-muted" placeholder="12345678">
                       </div>
                       <div class="form-group">
                           <input type="submit"  value="Change Password" class="btn btn-warning">
                       </div>
                      
                   </div>
               </div>
               
            </form>
        </div>
    </div>

@endsection