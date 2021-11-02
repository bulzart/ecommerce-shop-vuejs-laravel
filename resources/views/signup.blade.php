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
        <h3 class="text-center text-white pt-5">Sign up!</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" action="{{route('signupp')}}">
                        {{csrf_field()}}
                            <h3 class="text-center text-info">Sign up!</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">First name and lastname</label><br>
                                <input type="text" name="name" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Phone number</label><br>
                                <input type="text" name="tel" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label><br>
                                <input type="text" name="email" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password</label><br>
                                <input type="password" name="password" placeholder="Min 6 characters" class="form-control">
                            </div>
                           
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Sign up">
                           
                        </form>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

