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
@if(\Session::has('wrong'))
<div class="alert alert-warning alert-dismissible fade show mt-1" role="alert">
  {!! \Session::get('wrong') !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="assets/css/style.css">
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h2 class="text-center text-white pt-5">Login</h2>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post" action="{{route('login')}}">
                        {{csrf_field()}}
                            <h2 class="text-center text-info">Login</h2>      
                            <div class="form-group">
                                <label for="email" class="text-info">Email</label><br>
                                <input type="text" name="email" value="bulzarti@gmail.com" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password</label><br>
                                <input type="password" name="password"  value="123456" class="form-control">
                            </div>
                          
                            <div class="form-group">
                               
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

