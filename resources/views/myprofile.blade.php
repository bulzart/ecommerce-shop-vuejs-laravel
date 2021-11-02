@extends('layouts.shpalljet')
@section('login')

@endsection
@section('content')
<div class="container">
  
@if($errors->any())
<div class="text-center">
    {{ implode('', $errors->all(':message')) }}
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
  {!! \Session::get('success') !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Your profile</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" action="{{route('updateprofile')}}">
                        {{csrf_field()}}
                            <h3 class="text-center text-info">Your profile!</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">First name and lastname</label><br>
                                <input type="text" name="name" id="username" value="{{$user->name}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Phone number</label><br>
                                <input type="text" name="tel" id="password" value="{{$user->tel}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label><br>
                                <input type="text" name="email" id="password" value="{{$user->email}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password</label><br>
                                <input type="password" name="password" placeholder="Your new password" class="form-control">
                            </div>
                           @if(Auth::guard('perdoruesit')->user()->role == 'admin')
                           <div class="form-group pr-2">
                                <select class="form-control mb-2" name="adminornot">
                                    @if($user->role == 'admin')
                                <option value="admin" selected>Admin</option>
                                @else
                                <option value="admin">Admin</option>
                                @endif
                                @if($user->role == 'mod')
                                <option value="mod" selected>Moderator</option>
                                @else
                                <option value="mod">Moderator</option>
                                @endif
                                @if($user->role == 'user')
                                <option value="user" selected>User</option>
                                @else
                                <option value="user">User</option>
                                @endif
                            </div>
                            @endif
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Update">
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

