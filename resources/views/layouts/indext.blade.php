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
  background-image: url("");
  min-height: 600px; 
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
#shad:hover{
  box-shadow: rgba(60, 60, 93, 0.45) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
}

</style>
<meta charset="UTF-8">
  <meta name="description" content="Blog">
  <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Laravel">
  <meta name="author" content="Bulzart Aliu">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<title>{{config('app.name')}}</title>

<link rel="icon" href="images/smartphone.ico">
<link rel="stylesheet" href="{{ asset('css/app.css') }}" />
<script src="{{ asset('js/app.js') }}" defer></script> 

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <!-- Main CSS File -->
	    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/demos/demo-10.css">
    
 

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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


<div class="container mt-1">
@if(\Session::has('shto'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {!! \Session::get('shto') !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
</div>


<div id="app">
<example-component>
</example-component>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61801e9f86aee40a57396493/1fje7f80i';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<div class="d-flex text-center justify-content-center my-3 mx-2">
<img src="images/comeshere.jpg" style="cursor: pointer;">
</div>
<div class="text-center py-3 px-3 mb-1">
  <h3 class="h3" style="color: rgb(255,127,80)">Hot now!</h3>
</div>

<div class="d-flex justify-content-center text-center">
<div class="owl-carousel" id="shad">
                            @foreach($hot as $h)
                            <div class="item">
                                <figure class="product-media">
                                    <a href="{{route('shiko',$h->slug)}}">
                                        <img src="{{$h->path}}" alt="Product image" class="product-image">
                                        <img src="{{$h->path}}" alt="Product image" class="product-image-hover">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="{{route('shiko',$h->slug)}}">{{$h->emri}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        {{$h->cmimi}} {{$curr}}
                                    </div><!-- End .product-price -->

                                   <!-- End .product-nav -->
                                </div><!-- End .product-body -->
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </div>
                            @endforeach
                          </div>
</div>
<script src="owlcarousel/jquery.min.js"></script>
<script src="owlcarousel/owl.carousel.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
<script>
  var owl = $('.owl-carousel');
owl.owlCarousel({
    margin:10,
    autoplay:true,
    autoplayTimeout:2900,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:3,
            nav:true,
            loop:true
        },
        576:{
            items:4,
            nav:true,
            loop:true
        },
        768:{
          items:5,
          nav:true,
          loop:true
        },
        992:{
          items:6,
          nav:true,
          loop:true
        },
        1200:{
            items:7,
            nav:true,
            loop:true
        }}
});

</script>
</body>
</html>