@extends('layouts.shpalljet')

@section('content')
<head>
</head>
<div class="container">
<div id="hov">
<div class="text-center mt-2">
@if(\Session::has('porosi'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {!! \Session::get('porosi') !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if($cart != null)
@if($cart->items != null)
<div class="row" id="rowing" style="padding-bottom: 8px;">

@foreach($cart->items as $prod)
@if(Auth::guard('perdoruesit')->check())

<img src="{{$prod->url}}" class="img-fluid h-100 rounded float-start col-12 col-xs-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" style="margin-top: 25px;">

<div class="text-center col-12 col-xs-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" style="margin-top: 95px;">
<h4 class="h4">Price</h4>
<h5 class="h5">{{$prod->cmimi}} {{$curr->currency}}</h4>
</div>
<div class="text-center col-12 col-xs-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" style="margin-top: 95px;">
<h4 class="h4">Quantity</h4>
<a href="{{route('minus',$prod->id)}}"><span><i class="far fa-minus-square"></i></span></a>
<a href="{{route('shto',$prod->id)}}"><span><i class="far fa-plus-square"></i></span></a>
<h5 class="h5">{{$prod->sasia}}</h4>
</div>
<div class="text-center col-12 col-xs-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" style="margin-top: 115px;">
<a style="text-decoration:none;" href="{{route('deleteprod',$prod->id)}}"><h5><i class="far fa-window-close"></i></h5></a>
</div>
@endif
@if(!Auth::guard('perdoruesit')->check())
<img src="{{$prod['url']}}" style="margin-top: 45px;" class="img-fluid h-100 rounded float-start col-12 col-xs-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" style="margin-top: 25px;">
<div class="text-center col-12 col-xs-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" style="margin-top: 95px;">
<h4 class="h4">Price</h4>
<h5 class="h5">{{$prod['cmimi']}} {{$curr->currency}}</h4>
</div>
<div class="text-center col-12 col-xs-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" style="margin-top: 95px;">
<h4 class="h4">Quantity</h4>
<a href="{{route('minus',$prod['id'])}}"><span><i class="far fa-minus-square"></i></span></a>
<a href="{{route('shto',$prod['id'])}}"><span><i class="far fa-plus-square"></i></span></a>
<h5 class="h5">{{$prod['sasia']}}</h4>
</div>
<div class="text-center col-12 col-xs-12 col-md-3 col-sm-3 col-lg-3 col-xl-3" style="margin-top: 115px;">
<a style="text-decoration:none;" href="{{route('deleteprod',$prod['id'])}}"><h5><i class="far fa-window-close"></i></h5></a>
</div>
@endif
@endforeach

</div>
<h4 class="text-primary mt-2">Total price: {{$cart->total}} {{$curr->currency}}</h4>
<div class="text-center d-flex justify-content-center pr-3 pb-1">
<a href="{{route('checkout')}}"><button class="btn btn-primary">Check out!</button></a>
</div>
@endif
@endif
@if($cart == null || $cart->items == null)
<div id="rowing">
<h3 class="h3 text-primary pt-2 pb-2">Cart is empty!</h3>
</div>
@endif


</div>

</div>
</div>

@endsection

