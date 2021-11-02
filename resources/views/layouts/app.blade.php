@if(Auth::guard('perdoruesit')->check())
@php
    if(isset(App\Models\Cart::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->first()->sasia))
    {
      $sasia = App\Models\Cart::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->first()->sasia;
    }
    else{
      $sasia = 0;
    }
@endphp
@endif
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
#meshume:hover{
  opacity: 0.91;
}
img.logobaki{
max-width: 128px;
}
#shiko{
background: rgba(182,182,182,0.6);
}

#nav {
  
  background: rgb(210,135,255);
background: linear-gradient(171deg, rgba(210,135,255,0.7) 17%, rgba(51,117,246,0.6) 75%);

}
.parallax{
  background-image: url("images/s21.jpg");
  min-height: 600px; 
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
#rowing:hover{
  box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
  }
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<title>Mobishop e-commerce site</title>
<link rel="icon" href="images/smartphone.ico">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}" defer></script> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<script src="owlcarousel/jquery.min.js"></script>
<script src="owlcarousel/owl.carousel.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>

</head>
<body>

    <div id="app">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top text-center" id="nav" data-toggle="collapse" data-target=".navbar-collapse">
  <div class="container-fluid">
  <a href="{{route('home')}}"><img class="navbar-brand logobaki" src="images/smartphonelogoo.png"></img></a>
  <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      @if(!Auth::guard('perdoruesit')->check()) 
      <li class="nav-item">
      <a href="{{route('loging')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">Sign in</button></a>
        </li>
        <li class="nav-item">
      <a href="{{route('signup')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">Sign up</button></a>
        </li>@endif
    @if(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role == 'admin')  
      <li class="nav-item">
      <a href="{{route('allposts')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">All posts</button></a>
        </li>
        <li class="nav-item">
        <a href="{{route('orders')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">Orders</button></a>
        </li>
        <li class="nav-item">
        <a href="{{route('addadmin')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">Admins</button></a>
</li>
<li class="nav-item">
<a href="{{route('insert')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">Categories,currency</button></a>
</li>
<li class="nav-item">
<a href="{{route('uploadg')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">Upload</button></a>
</li>

@elseif(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role == 'mod')
<li class="nav-item">
<a href="{{route('uploadg')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">Upload</button></a>
</li>
<li class="nav-item">
<a href="{{route('allposts')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">My posts</button></a>
</li>
@endif

@if(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role != 'admin')
<li class="nav-item">
<a href="{{route('myorders')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">My orders</button></a>
</li>
<li class="nav-item">
<a href="{{route('myprofile')}}"><button style="margin-left: 2px; margin-top: 2px;" class="btn mr-1" type="button" id="shiko">My profile</button></a>
</li>
@endif
@if(Auth::guard('perdoruesit')->check())
<li class="nav-item">
<a href="{{route('logout')}}"><button class="btn" style="margin-left: 2px; margin-top: 2px;" type="button" id="shiko">Log out</button></a>
</li>
@endif
<li class="navi-item">
<a href="{{route('shporta')}}"><button class="btn mr-1" type="button" style="margin-left: 2px; margin-top: 2px;" id="shiko">@if(!Auth::guard('perdoruesit')->check())@if(Session::get('sasia') != 0) Cart <i class="fas fa-shopping-cart"></i> <span class="badge bg-primary rounded-pill">{{\Session::get('sasia')}}</span> @else Cart <i class="fas fa-shopping-cart"></i> <span class="badge bg-primary rounded-pill">0</span>@endif @else @if($sasia > 0) Cart <i class="fas fa-shopping-cart"></i> <span class="badge bg-primary rounded-pill">{{$sasia}}</span> @else Cart <i class="fas fa-shopping-cart"></i> <span class="badge bg-primary rounded-pill">0</span>@endif @endif</button></a>
</li>    
</ul>
</div>   
</div>        
</nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
