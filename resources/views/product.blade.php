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
<html lang="en">


<!-- molla/product.html  22 Nov 2019 09:54:50 GMT -->
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="images/32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
   

    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
	    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-10.css">
    <link rel="stylesheet" href="assets/css/demos/demo-10.css">
</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="header-top">
             <!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">             
			   <div class="container">


                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            
                           
                        </button>

                        <a href="{{route('home')}}" class="logo">
                            <img src="images/smartphonelogoo.png" alt=" width="105" height="25">
                        </a>

                        <nav>
                            <ul>
                                <li style="margin-left: 38px; margin-top: 15px;" class="">
                                    <a href="{{route('home')}}" style="font-size: 20px;">Home</a>

                                    
                                </li>
                                <li>
                                   <li class="megamenu-container active" style="margin-left: 113px;">
								
						</li>
                        @if(Auth::guard('perdoruesit')->check())
   
@else

@endif 

<!-- Modal -->
						</ul>
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                    <!-- End .header-search -->
                      <!-- End .compare-dropdown -->

                    <div class="dropdown cart-dropdown">
                            <a href="{{route('shporta')}}" class="dropdown-toggle" >
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count">@if(Auth::guard('perdoruesit')->check()) {{$sasia}} @endif @if(!Auth::guard('perdoruesit')->check()) @if(Session::get('sasia') != 0) {{\Session::get('sasia')}} @else 0 @endif @endif</span>
                            
							</a>

                         <!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
          			   @if(\Session::has('shto'))
<div class="alert alert-success alert-dismissible fade show my-2 mx-2" role="alert">
  {!! \Session::get('shto') !!}
  <button type="button" class="btn-close" style="padding-right: 40px;" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="{{$upload->path}}" data-zoom-image="{{$upload->path}}">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure>
										<!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="{{$upload->path}}" style="outline:none; height: 2px;" data-zoom-image="{{$upload->path}}">
                                              <img src="{{$upload->path}}">
												</a>
												@foreach($images as $img)
												 <a class="product-gallery-item" href="#"  data-image="{{$img->url}}" style="outline:none;" data-zoom-image="{{$img->url}}">
                                                <img src="{{$img->url}}" style="margin-top: auto;">
                                            </a>
@endforeach                           
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6 pt-7">
                                <div class="product-details">
                                    <h1 class="product-title">{{$upload->emri}}</h1><!-- End .product-title -->

                                 <!-- End .rating-container -->

                                    <div class="product-price">
									{{$upload->cmimi}} {{$curr->currency}}
                                    </div><!-- End .product-price -->

                                    <div class="product-details-action">
                                        <a href="{{route('shto',$upload->id)}}" class="btn-product btn-cart"><span>add to cart</span></a>

                                      <!-- End .details-action-wrapper -->
                                    </div>
<div class="row">
<div class="col-6">
                                    <div class="details-filter-row details-row-size">
                                        <label>Color</label><span>{{$upload->ngjyra}}</span>

                                       <!-- End .product-nav -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Disk size</label><span>{{$upload->disk}}
                                     <!-- End .select-custom -->

                                       
                                    </div><!-- End .details-filter-row -->
									  <div class="details-filter-row details-row-size">
                                        <label for="size">Screen</label><span>{{$upload->size}} inch

                                    </div>
									  <div class="details-filter-row details-row-size">
                                        <label for="size">Battery</label><span>{{$upload->battery}}

                                    </div>
</div>
<div class="col-6">
                                    <div class="details-filter-row details-row-size">
                                        <label>CPU</label><span>{{$upload->cpu}}</span>

                                       <!-- End .product-nav -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="size">RAM</label><span>{{$upload->ram}}

                                    </div><!-- End .details-filter-row -->
									  <div class="details-filter-row details-row-size">
                                        <label for="size">Year:</label><span>{{$upload->viti}}

                                    </div>
									  <div class="details-filter-row details-row-size">
                                        <label for="size">GPU</label><span>{{$upload->gpu}}

                                    </div>
                                    </div>
                                    
      @if($specs->items != null)
                                    @foreach($specs->items as $item)
    <div class="col-6">
    <div class="details-filter-row details-row-size">
                                        <p>{{$item}}</p>

                                       <!-- End .product-nav -->
                                    </div>
</div>
@endforeach
@endif

                                 </div>

                                 
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                  

                    <h2 class="title text-center mb-4">You may also like!</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow justify-content-center d-flex" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                    @foreach($related as $rel)
					@if($rel->id != $upload->id)
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                <a href="{{route('shiko',$rel)}}">
                                    <img src="{{$rel->path}}" alt="Product image" class="product-image">
                                </a>

                           

                                <div class="product-action">
                                    <a href="{{route('shto',$rel->id)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="{{route('shiko',$rel)}}">{{$rel->emri}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
								{{$rel->cmimi}} {{$curr->currency}}
                                </div><!-- End .product-price -->
                           
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
						@endif
						@endforeach
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Sticky Bar -->
    

    <!-- Mobile Menu -->
    <!-- End .mobil-menu-overlay -->

  
    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->
</html>