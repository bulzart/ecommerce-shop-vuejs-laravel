@extends('layouts.app')

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
<br>


<table class="table table-hover">
<tr>
<th>ID&nbsp;</th>
<th>User name&nbsp;</th>
<th>Name on order&nbsp;&nbsp;&nbsp;</th>
<th>Country&nbsp;<th>
<th>Address&nbsp;</th>
<th>Tel&nbsp;</th>
<th>Time&nbsp;</th>
<th>Ordered products</th>
<th>Order message</th>
</tr>

@foreach($orders as $order)

<tr>
  <td>{{$order->id}}&nbsp;</td>
<td>@if($order->perdoruesi_id != null)<p>{{$order->perdoruesi->name}}</p>@endif&nbsp;</td>
<td><p>{{$order->emri}}&nbsp;&nbsp;&nbsp;</p></td>
<td><p>{{$order->shteti}}&nbsp;</p><td>
<td><p>{{$order->adresa}}&nbsp;</p></td>
<td><p>{{$order->tel}}&nbsp;</p></td>
<td><p>{{$order->created_at}}&nbsp;</p></td>
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
</body>
</html>
@endsection