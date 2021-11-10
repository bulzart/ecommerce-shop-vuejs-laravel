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
<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">

#modalii{
  background: rgb(255,255,255);
}
#shiko{
background: rgba(182,182,182,0.6);
}
.parallax{
  background-image: url("images/sgcdesignco-81Dfucag9OY-unsplash.jpg");
  min-height: 600px; 
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}


#red{
  color:red;
}
.ngjyrafont{
 color: rgb(8,146,208);
}
.pillcolor{
  background: rgb(153,186,221);
}
#rowing:hover{
  box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
  }

#filter{
  outline: 2px solid #1C6EA4;
outline-offset: 0px;
}
</style>
<meta charset="UTF-8">
  <meta name="description" content="Blog">
  <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Laravel">
  <meta name="author" content="Bulzart Aliu">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<title>{{config('app.name')}}</title>

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <!-- Main CSS File -->
	    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/demos/demo-10.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top text-center d-flex justify-content-end container-fluid" id="nav" data-toggle="collapse" data-target=".navbar-collapse">
<a href="{{route('home')}}"><img class="navbar-brand" src="images/ecommerce.webp" height="128" width="128"></a>
  <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-1" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      @if(!Auth::guard('perdoruesit')->check()) 
      <li class="nav-item mr-2">
      <a href="{{route('loging')}}"><i class="far fa-user" style="font-size: 26px;color: #306EFF;"><p>My account</p></i></a>
        </li>
      @endif
    @if(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role == 'admin')  
      <li class="nav-item mr-2">
      <a href="{{route('allposts')}}"><i class="fas fa-paste" style="font-size: 26px;color: #306EFF;"><p>All posts</p></i></a>
        </li>
        <li class="nav-item mr-2">
        <a href="{{route('orders')}}"><i class="fas fa-truck" style="font-size: 26px;color: #306EFF;"><p>Orders</p></i></a>
        </li>
        <li class="nav-item mr-2">
        <a href="{{route('addadmin')}}"><i class="fas fa-users-cog" style="font-size: 26px;color: #306EFF;"><p>Admins</p></i></a>
</li>
<li class="nav-item mr-2">
<a href="{{route('insert')}}"><i class="fas fa-cogs" style="font-size: 26px;color: #306EFF;"><p>Settings</p></i></a>
</li>
<li class="nav-item mr-2">
<a href="{{route('uploadg')}}"><i class="fas fa-upload" style="font-size: 26px;color: #306EFF;"><p>Upload</p></i></a>
</li>

@elseif(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role == 'mod')
<li class="nav-item mr-2">
<a href="{{route('uploadg')}}"><i class="fas fa-upload" style="font-size: 26px; color: #306EFF;"><p>Upload</p></i></a>
</li>
<li class="nav-item">
      <a href="{{route('allposts')}}"><i class="fas fa-paste" style="font-size: 26px; color: #306EFF;"><p>All posts</p></i></a>
        </li>
@endif

@if(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role != 'admin')

<li class="nav-item mr-2">
<a href="{{route('myprofile')}}"><i class="fas fa-users-cog" style="font-size: 26px;color:#306EFF;"><p>My profile</p></i></a>
</li>
@endif
@if(Auth::guard('perdoruesit')->check())
<li class="nav-item mr-2">
<a href="{{route('logout')}}"><i class="fas fa-sign-out-alt" style="font-size: 26px;color:#306EFF;"><p>Log out</p></i></a>
</li>
@endif
<li class="navi-item mr-2 p-2" style="margin-top: 7px;">
<a  href="{{route('shporta')}}">@if(!Auth::guard('perdoruesit')->check())@if(Session::get('sasia') != 0)<i style="font-size: 23px; color:#306EFF;" class="fas fa-shopping-cart"></i> <span class="badge rounded-pill pillcolor" style="margin-bottom: 3px;">{{\Session::get('sasia')}}</span> @else<i style="font-size: 23px; color:#306EFF;" class="fas fa-shopping-cart"></i> <span class="badge rounded-pill pillcolor" style="margin-bottom: 3px;">0</span>@endif @else @if($sasia > 0) <i style="font-size: 23px; color:#306EFF;" class="fas fa-shopping-cart"></i> <span class="badge rounded-pill pillcolor" style="margin-bottom: 3px;">{{$sasia}}</span> @else<i style="font-size: 23px; color:#306EFF;" class="fas fa-shopping-cart"></i> <span class="badge rounded-pill pillcolor" style="margin-bottom: 3px;">0</span>@endif @endif</button></a>
</li>    
</ul>
</div>   
</div>        
</nav>

<div class="container">
@yield('content')
<br>
<br>
@yield('java')
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>



