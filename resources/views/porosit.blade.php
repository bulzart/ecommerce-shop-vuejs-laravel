@extends('layouts.shpalljet')

@section('content')
<div class="container">
<div class="bg-light">

@if($cart != null)
@if($cart->items != null)

<ul class="list-group mt-2">
@foreach($cart->items as $prod)
@if(Auth::guard('perdoruesit')->check())
<li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">{{$prod->emri}}</div>
      {{$prod->ngjyra}} , {{$prod->cmimi}} {{$curr}}
    </div>
    <span class="badge bg-primary rounded-pill mr-2 mt-3">{{$prod->sasia}} </span><br>
    <div style="margin-top: 12px;">
    <a class="mt-2" href="{{route('deleteprod',$prod->id)}}"><i class="far fa-window-close"></i></a></div>
  </li>
@endif
@if(!Auth::guard('perdoruesit')->check())
<li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">{{$prod['emri']}}</div>
      {{$prod['ngjyra']}} , {{$prod['cmimi']}} {{$curr}}
    </div>
    <span class="badge bg-primary rounded-pill mr-2 mt-3">{{$prod['sasia']}} </span><br>
    <div style="margin-top: 12px;">
    <a class="mt-2" href="{{route('deleteprod',$prod['id'])}}"><i class="far fa-window-close"></i></a></div>
  </li>
@endif
@endforeach


</div>

<br>
<div class="text-center">
<form
                     
                        action="{{ route('porosit') }}"
                        method="post"
                        >
                        @csrf
<div class="row">
  <div class="mb-2 col-6">
    <label class="form-label">Name and surname</label>
    <input type="text" class="form-control"  name="emri">
  </div>
  <div class="mb-2 col-6">
    <label  class="form-label">Phone number</label>
    <input type="text" class="form-control" name="nr">
  </div>
  <div class="mb-2 col-6">
    <label class="form-label">Country</label>
    <input type="text" placeholder="Prishtina,North Dakota,Kalkota ..." class="form-control" name="shteti">
  </div>
  <div class="mb-2 col-6">
    <label class="form-label">Address</label>
    <input type="text" class="form-control"  name="adresa">
  </div>
  <div class="mb-2 col-6">
    <label class="form-label">Zip code</label>
    <input type="text" class="form-control"  name="zip">
  </div>
  <div class="mb-2 col-6">
    <label class="form-label">Email</label>
    <input type="text" class="form-control"  name="email">
  </div>
  <input type="submit" value="Submit" class="btn btn-success">
  </div>
  </div>
</form>
</div>
@endif
@endif

@if($cart == null || $cart->items == null)
<div class="text-center">
<h3 class="h3 text-primary">Cart is empty!</h3>
</div>
@endif


</div>


@endsection

