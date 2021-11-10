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
  .ngjyrafont{
 color: rgb(8,146,208);
}
.pillcolor{
  background: rgb(153,186,221);
}
#filter{
  outline: 2px solid #1C6EA4;
outline-offset: 0px;
}

</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

   
    <nav class="navbar navbar-expand-lg navbar-light sticky-top text-center" id="nav" data-toggle="collapse" data-target=".navbar-collapse">
  <div class="container-fluid">
  <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      @if(!Auth::guard('perdoruesit')->check()) 
      <li class="nav-item">
      <a href="{{route('loging')}}"><i class="far fa-user" style="margin-left: 2px; margin-top: 2px;font-size: 26px; margin-left: 8px;"><p>My account</p></i></a>
        </li>
      @endif
    @if(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role == 'admin')  
      <li class="nav-item">
      <a href="{{route('allposts')}}"><i class="fas fa-paste" style="margin-left: 2px; margin-top: 2px;font-size: 26px; margin-left: 8px;"><p>All posts</p></i></a>
        </li>
        <li class="nav-item">
        <a href="{{route('orders')}}"><i class="fas fa-truck" style="margin-left: 2px; margin-top: 2px;font-size: 26px; margin-left: 8px;"><p>Orders</p></i></a>
        </li>
        <li class="nav-item">
        <a href="{{route('addadmin')}}"><i class="fas fa-users-cog" style="margin-left: 2px; margin-top: 2px;font-size: 26px; margin-left: 8px;"><p>Admins</p></i></a>
</li>
<li class="nav-item">
<a href="{{route('insert')}}"><i class="fas fa-cogs" style="margin-left: 2px; margin-top: 2px;font-size: 26px; margin-left: 8px;"><p>Settings</p></i></a>
</li>
<li class="nav-item">
<a href="{{route('uploadg')}}"><i class="fas fa-upload" style="margin-left: 2px; margin-top: 2px;font-size: 26px; margin-left: 8px;"><p>Upload</p></i></a>
</li>

@elseif(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role == 'mod')
<li class="nav-item">
<a href="{{route('uploadg')}}"><i class="fas fa-upload" style="margin-left: 2px; margin-top: 2px;font-size: 26px; margin-left: 8px;"><p>Upload</p></i></a>
</li>
<li class="nav-item">
      <a href="{{route('allposts')}}"><i class="fas fa-paste" style="margin-left: 2px; margin-top: 2px;font-size: 26px; margin-left: 8px;"><p>All posts</p></i></a>
        </li>
@endif

@if(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role != 'admin')

<li class="nav-item">
<a href="{{route('myprofile')}}"><i class="fas fa-users-cog" style="margin-left: 2px; margin-top: 2px;font-size: 26px; margin-left: 8px;"><p>My profile</p></i></a>
</li>
@endif
@if(Auth::guard('perdoruesit')->check())
<li class="nav-item">
<a href="{{route('logout')}}"><i class="fas fa-sign-out-alt" style="margin-left: 2px; margin-top: 2px;font-size: 26px; margin-left: 8px;"><p>Log out</p></i></a>
</li>
@endif
<li class="navi-item p-2" style="margin-top: 6px; margin-left: 10px;">
<a  href="{{route('shporta')}}">@if(!Auth::guard('perdoruesit')->check())@if(Session::get('sasia') != 0)<i style="font-size: 23px;" class="fas fa-shopping-cart ngjyrafont"></i> <span class="badge rounded-pill pillcolor">{{\Session::get('sasia')}}</span> @else<i style="font-size: 23px;" class="fas fa-shopping-cart ngjyrafont"></i> <span class="badge rounded-pill pillcolor">0</span>@endif @else @if($sasia > 0) <i style="font-size: 23px;" class="fas fa-shopping-cart ngjyrafont"></i> <span class="badge rounded-pill pillcolor">{{$sasia}}</span> @else<i style="font-size: 23px;" class="fas fa-shopping-cart ngjyrafont"></i> <span class="badge rounded-pill pillcolor">0</span>@endif @endif</button></a>
</li>    
</ul>
</div>   
</div>        
</nav>

        <main class="">
            @yield('content')
        </main>
    
</body>
</html>
