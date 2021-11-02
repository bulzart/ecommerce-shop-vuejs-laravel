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
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {!! \Session::get('success') !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Add admin there</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" action="{{route('addadminp')}}">
                        {{csrf_field()}}
                            <h3 class="text-center text-info">Add admin there</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Name</label><br>
                                <input type="text" name="name" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Phone number(optimal)</label><br>
                                <input type="text" name="tel" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label><br>
                                <input type="text" name="email" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password</label><br>
                                <input type="password" name="password" placeholder="Min 6 characters" class="form-control">
                            </div>
                          
                            
                            <div class="form-group pr-2">
                                <select class="form-control mb-2" name="adminornot">
                                <option value="admin">Admin</option>
                                <option value="non">Moderator</option>
                            </div>
                          
                           
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                           
                        </form>
                        
                        <div class="text-center mt-4">
                            
                            <h3 class="text-info">Delete admin</h3></div>
                        <form id="login-form" class="form" method="POST" action="{{route('deladmin')}}">
                        {{csrf_field()}}
                        <div class="form-group pr-2">
                                <select name="adminval" class="form-control mb-2">
                                @foreach($admins as $admin)
                                <option value="{{$admin->id}}">{{$admin->name}}</option>
                                @endforeach
                            </div>
                            <input type="submit" class="btn btn-info btn-md" value="Delete">
                          
                        </form>
                        <div class="text-center mt-4">
                            
                            <h3 class="text-info">Update admin</h3></div>
                        <form id="login-form" class="form" method="GET" action="{{route('myprofilep')}}">
                        {{csrf_field()}}
                        <div class="form-group pr-2">
                                <select name="adminval" class="form-control mb-2">
                                @foreach($admins as $admin)
                                <option value="{{$admin->id}}">{{$admin->name}}</option>
                                @endforeach
                            </div>
                            <input type="submit" class="btn btn-info btn-md" value="Update">
                          
                        </form>
                      
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

