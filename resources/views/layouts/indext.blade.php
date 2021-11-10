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



#nav {
  background: #FFFFFF;
}

#shad:hover{
  box-shadow: rgba(60, 60, 93, 0.45) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
}
.ngjyrafont{
 color: rgb(8,146,208);
}
.pillcolor{
  background: rgb(153,186,221);
}
#filter{
    margin-bottom: 10px;
}





/* adds some margin below the link sets  */
.navbar .dropdown-menu div[class*="col"] {
   margin-bottom:1rem;
}

.navbar .dropdown-menu {
  border:none;
min-height: 0px;
}

/* breakpoint and up - mega dropdown styles */
@media screen and (min-width: 992px) {
  .navbar .dropdown-menu {
  border:none;
min-height: 150px;
}
  /* remove the padding from the navbar so the dropdown hover state is not broken */
.navbar {
  padding-top:0px;
  padding-bottom:0px;
}

/* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
.navbar .nav-item {
  padding:.5rem .5rem;
  margin:0 .25rem;
}

/* makes the dropdown full width  */
.navbar .dropdown {position:static;}

.navbar .dropdown-menu {
  width:100%;
  left:0;
  right:0;
/*  height of nav-item  */
  top: auto;
 
  
  display:block;
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.3s linear;
  
}
  
 

  
  /* shows the dropdown menu on hover */
.navbar .dropdown:hover .dropdown-menu, .navbar .dropdown .dropdown-menu:hover {
  display:block;
  visibility: visible;
  opacity: 1;
  transition: visibility 0s, opacity 0.3s linear;
}
  
  .navbar .dropdown-menu {
 
    background-color: #fff;
  }

}
#signup{
  outline: 2px solid #1C6EA4;
outline-offset: 0px;

}
 @media screen and (min-height: 600px) and (min-width: 800px) {
#productimage{
  max-width: 252px;
  min-width: 245px;
  max-height: 152px;
  min-height: 146px;
}
}





</style>
<meta charset="UTF-8">
  <meta name="description" content="Blog">
  <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Laravel">
  <meta name="author" content="Bulzart Aliu">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<title>Mobishop e-commerce site</title>

<link rel="icon" href="images/smartphone.ico">
<script src="{{ asset('js/app.js') }}" defer></script> 
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

<div class="container ">
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
<div class="text-center py-3 px-3 mb-1">
  <h3 class="h3" style="color: rgb(255,127,80)">Hot now!</h3>
</div>

<div class="d-flex justify-content-center text-center">
<div class="owl-carousel pt-3" id="shad">
                            @foreach($hot as $h)
                            <div class="item">
                                <figure class="product-media">
                                    <a href="{{route('shiko',$h->slug)}}">
                                        <img src="{{$h->path}}" alt="Product image" class="product-image" id="productowl">
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
<div style="background: #306EFF; color: #FFFFFF;" class="justify-content-center text-center d-flex mt-3" id="description">
<span><b>Ecommerce is the online wholesaler for small and large entrepreneurs.</b>With us you benefit from the advantages of a wholesaler with the convenience of a web shop. The extensive range consists of more than 1 million products from the non-food leisure sector. We are in the field of bicycles, bicycle parts and accessories, toys, sports and leisure, outdoor, home and garden, party, baby, club chandising, glasses and car accessories of all quality brands. All products are always in stock in our two distribution centers. Fast delivery is therefore guaranteed, so that you can quickly replenish the inventory of your shop or webshop. Ecommerce is therefore more than an online wholesaler, we are an extension of your range and your inventory.<br><br>
<b>The convenience of a wholesaler as a webshop The online wholesaler Ecommerce</b>
is there for companies, schools, foundations and associations. You can easily set up an account with your Chamber of Commerce or VAT number. You will then immediately benefit from all of our advantages. As a wholesaler, we are unique in the market thanks to the speed, clarity, simplicity and ease with which you order from us. We apply competitive wholesale prices, you have no minimum purchase, no minimum order, and no annual commitment. In our webshop you have the option of ordering products 24 hours a day, seven days a week, which will be delivered to you within two to three working days. At Ecommerce you benefit from the advantages of a wholesaler with the convenience of a web shop.</span>
</div>
<div class="text-center" style="color: #2B547E;font-size: 15px;">
    Ecommerce store &copy;
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

$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready

// breakpoint and up  
$(window).resize(function(){
  if ($(window).width() >= 992){  

      // when you hover a toggle show its dropdown menu
      $(".navbar .dropdown-toggle").hover(function () {
         $(this).parent().toggleClass("show");
         $(this).parent().find(".dropdown-menu").toggleClass("show"); 
       });

        // hide the menu when the mouse leaves the dropdown
      $( ".navbar .dropdown-menu" ).mouseleave(function() {
        $(this).removeClass("show");  
      });
  
    // do something here
  } 
});  
  
  

// document ready  
});
</script>
</body>
</html>