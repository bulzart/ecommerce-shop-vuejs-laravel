<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">

#meshume:hover{
  opacity: 0.96;
}
img.logobaki{
max-width: 128px;
}
#modalii{
  background: rgb(255,255,255);
}
#toalign img{
  vertical-align: middle;
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
</style>
<meta charset="UTF-8">
  <meta name="description" content="Blog">
  <meta name="keywords" content="HTML, CSS, JavaScript, PHP, Laravel">
  <meta name="author" content="Bulzart Aliu">
  <link rel="stylesheet" href="assets/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
<title>{{config('app.name')}}</title>
<link rel="icon" href="images/logo.ico">
</head>
<body>
  <div class="container">
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
  <a href="{{route('orders')}}"><button style="margin-right: 2px;" class="btn btn-secondary">Go  to orders</button></a>
  <a href="{{route('home')}}"><button class="btn btn-secondary">Go Home</button></a>
</div>
<br>
<div class="d-flex justify-content-center text-center mb-3 col-12" style="padding-bottom: 183px;">
  <form action="{{route('listdoneorders')}}" method="post" class="form-control">
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
<th scope="col">User name</th>
<th scope="col">Orderer name and surname</th>
<th scope="col">Country<th>
<th scope="col">Address</th>
<th scope="col">Tel</th>
<th scope="col">Time</th>
<th scope="col">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Ordered products</th>
</tr>

@foreach($orders as $order)

<tr scope="row">
<td>@if($order->perdoruesi_id != null)<p>{{$order->perdoruesi->name}}</p>@endif</td>
<td><p>{{$order->emri}}</p></td>
<td><p>{{$order->shteti}}</p><td>
<td><p>{{$order->adresa}}</p></td>
<td><p>{{$order->tel}}</p></td>
<td><p>{{$order->created_at}}</p></td>
<td>
<div class="d-flex flex-column bd-highlight mb-3 text-center">
  @if($arrcnt > 1)
@foreach($porosia[$cnt]->items as $p)
<a title="Look at the product" href="{{route('shiko',$p->slug)}}"><img src="{{$p->url}}" class="rounded col-12 col-xs-12 col-md-6 col-sm-6 col-lg-6 col-xl-6"></a>
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
<td scope="row"><a href="{{route('undone',$order->id)}}"><button class="btn btn-secondary">Mark undone!</button></a></td>
<td scope="row"><a href="{{route('delorder',$order->id)}}"><button class="btn btn-secondary ">Delete order!</button></a></td>
@endforeach
</tr>
</table>
</div>
@endif
@if($arrcnt == 0)
<div class="d-flex justify-content-center text-center mb-3">
<h2 class="h2 text-secondary" style="margin-right: 5px;">No orders!</h2>
<a href="{{route('orders')}}"><button style="margin-right: 2px;" class="btn btn-secondary">Go to orders</button></a>
  <a href="{{route('home')}}"><button class="btn btn-secondary">Go Home</button></a>
</div>

@endif
<br>
</body>
</html>

