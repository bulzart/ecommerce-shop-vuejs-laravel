
@extends('layouts.shpalljet')
@section('login')

@endsection
@section('content')
<br>
<div class="container">
@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {!! \Session::get('success') !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="d-flex justify-content-center">
@if($arrcnt > 0)
  <a href="{{route('doneorders')}}"><button style="margin-right: 2px;" class="btn btn-secondary">Go to done orders</button></a>
  <a href="{{route('home')}}"><button class="btn btn-secondary">Go Home</button></a>
</div>
<br>
<div class="d-flex justify-content-center text-center mb-3" style="padding-bottom: 183px;">
  <form action="{{route('listorders')}}" method="post" class="form-control">
    @csrf
  <h5 class="h5">From</h5>
<input type="date" name="from" class="form-control">
<h5 class="h5">To</h5>
<input type="date" name="now" class="form-control">
<br>
<br>
<div class="d-flex justify-content-center">
<input type="submit" class="btn btn-secondary" value="List!">
</div>
</form>
</div>

<table class="table table-hover">
<tr>
<th>User name</th>
<th>Orderer name and surname</th>
<th>Country<th>
<th>Address</th>
<th>Tel</th>
<th>Time</th>
<th>Ordered products</th>
<th>Email</th>
</tr>

@foreach($orders as $order)
<tr>
<td>@if($order->perdoruesi_id != null)<p>@if($order->perdoruesi->name != null){{$order->perdoruesi->name}}@endif</p>@endif</td>
<td><p>{{$order->emri}}</p></td>
<td><p>{{$order->shteti}}</p><td>
<td><p>{{$order->adresa}} Zip: {{$order->zip}}</p></td>
<td><p>{{$order->tel}}</p></td>
<td><p>{{$order->created_at}}</p></td>
<td>
<div class="d-flex flex-column bd-highlight mb-3 text-center">
  @if($arrcnt > 1)
@foreach($porosia[$cnt]->items as $p)
<a title="Look at the product" href="{{route('shiko',$p->slug)}}"><img src="{{$p->url}}" class="rounded col-12 col-xs-12 col-md-6 col-sm-6 col-lg-6 col-xl-6"></a>
<br>
  <p>Quantity:{{$p->sasia}}x</p>

<br>
@endforeach
</td>
<p style="display: none;">{{$cnt++}}</p>
@else
@foreach($porosia[0]->items as $p)
<a title="Look at the product" href="{{route('shiko',$p->slug)}}"><img src="{{$p->url}}" class="rounded col-12 col-xs-12 col-md-6 col-sm-6 col-lg-6 col-xl-6"></a>
<p>Quantity:{{$p->sasia}}x</p>
<br>
@endforeach
@endif
@if($order->mesazh != null)
<td><p>{{$order->mesazh}}</p></td>
@else
<td><p>None!</p></td>
@endif

<td><a href="{{route('done',$order->id)}}"><button class="btn btn-secondary">Mark done!</button></a></td>
<td><a href="{{route('delorder',$order->id)}}"><button class="btn btn-secondary ">Delete order!</button></a></td>
@endforeach
</tr>
</table>
</div>
@endif
@if($arrcnt == 0)
<div class="d-flex justify-content-center text-center mb-3">
<h2 class="h2 text-secondary" style="margin-right: 5px;">No orders!</h2>
<a href="{{route('doneorders')}}"><button style="margin-right: 2px;" class="btn btn-secondary">Go to done orders</button></a>
  <a href="{{route('home')}}"><button class="btn btn-secondary">Go Home</button></a>
</div>
@endif
<br>
@endsection

