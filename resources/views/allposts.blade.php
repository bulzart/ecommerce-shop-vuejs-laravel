@extends('layouts.shpalljet')
@section('login')

@endsection
@section('content')
<div class="container">
@if(\Session::has('deleted'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {!! \Session::get('deleted') !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {!! \Session::get('success') !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if(count($shpalljet) == 0)
<div class="text-center mt-2">
  <h3 class="h3">No uploaded posts!</h3>
</div>
@endif



  @if(Auth::guard('perdoruesit')->user()->role == "admin")
  <div class="page-content mt-2">
    <div class="products mb-3">
         <div class="row d-flex justify-content-center text-center">
@foreach($shpalljet as $shpallje)
<div class="col-12 col-md-6 col-sm-6 col-xs-12 col-lg-4 col-xl-4 mb-4 mr-2 text-center">
<div class="product product-7 text-center">
<figure class="product-media">
                                            
                                            <a href="{{route('shiko',$shpallje->slug)}}">
                                                <img src="{{$shpallje->path}}" alt="Product image" class="product-image" id="productimage2">
                                            </a>
                                        </figure>
                                        <div class="product-body">
                                               <!-- End .product-cat -->
                                                <h3 class="product-title">{{$shpallje->emri}}</h3><!-- End .product-title -->
                                             
                                               

                                                <button type="button" class="btn" style="margin-bottom: 3px;" id="shiko" data-bs-toggle="modal" data-bs-target="#{{$shpallje->slug}}">Edit</button>
    <a href="{{route('fshije',$shpallje->id)}}"><button style="margin-bottom: 3px;" type="button" class="btn" id="shiko">Delete</button></a>
    <a href="{{route('shiko',$shpallje)}}"><button type="button" class="btn" id="shiko">View post</button></a>
    

                                            </div><!-- End .product-body -->
                                        </div>

    </div>


<!-- Modal -->
<div class="modal fade" id="{{$shpallje->slug}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modalii">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('ndrysho',$shpallje->id)}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="text-center">
      <h5 class="h5">Change images</h5>
</div>
      <div class="row">
      <div class="col-4 col-md-4 col-sm-4 col-xl-4 col-lg-4 col-xs-12">
      <input type="file" name="image"  title="Change the first one.">Change first one.
      </div>
      
      @for($i = 1; $i<= $shpallje->cnt; $i++)
      <input type="file" name="image{{$i-1}}" class="col-4 col-md-4 col-sm-4 col-xl-4 col-lg-4 col-xs-12" title="Change the {{$i+1}} one">
      @endfor
      </div>
 
      <div class="text-center">
      <p>Name</p>
      <input type="text" name="emri" class="form-control text-center" value="{{$shpallje->emri}}">
      <p>Price</p>
      <input type="text" name="cmimi" class="form-control text-center" value="{{(float) $shpallje->cmimi}}">
      <p>Color</p>
      <input type="text" name="ngjyra" class="form-control text-center" value="{{$shpallje->ngjyra}}">
      <p>Year</p>
      <input type="text" name="viti" class="form-control text-center" value="{{$shpallje->viti}}">
      <p>Model</p>
      <select name="car_models_id">
      @foreach($modelet as $modeli)
      @if($modeli->id == $shpallje->car_models_id)
       <option selected value="{{$modeli->id}}">{{$modeli->modeli}}</option>
       @else
       <option value="{{$modeli->id}}">{{$modeli->modeli}}</option>
       @endif
       @endforeach
      </select>
      <br>
      <button class="btn btn-danger mb-2 mt-1">Delete costum added specs!</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-secondary" value="Change">
        </form>
        
</div>
</div>
</div>
</div>

  </div>
  @endforeach
</div>
</div>

  @else
  @foreach($shpalljet as $shpallje)
  @if($shpallje->perdoruesi_id == Auth::guard('perdoruesit')->user()->id)
<div class="col-12 col-md-6 col-sm-6 col-xs-12 col-lg-4 col-xl-4 mb-4 text-center">
  <img src="{{$shpallje->path}}" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{$shpallje->emri}}</h5>
    <button type="button" class="btn" style="margin-bottom: 3px;" id="shiko" data-bs-toggle="modal" data-bs-target="#{{$shpallje->slug}}">Edit</button>
    <a href="{{route('fshije',$shpallje->id)}}"><button style="margin-bottom: 3px;" type="button" class="btn" id="shiko">Delete</button></a>
    <a href="{{route('shiko',$shpallje)}}"><button type="button" class="btn" id="shiko">View post</button></a>
    
</div>
    </div>
    
<!-- Modal -->
<div class="modal fade" id="{{$shpallje->slug}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modalii">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('ndrysho',$shpallje->id)}}" method="POST" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="text-center">
      <h5 class="h5">Change images</h5>
</div>
      <div class="row">
      <div class="col-4 col-md-4 col-sm-4 col-xl-4 col-lg-4 col-xs-12">
      <input type="file" name="image"  title="Change the first one.">Change first one.
      </div>
      
      @for($i = 1; $i<= $shpallje->cnt; $i++)
      <input type="file" name="image{{$i-1}}" class="col-4 col-md-4 col-sm-4 col-xl-4 col-lg-4 col-xs-12" title="Change the {{$i+1}} one">
      @endfor
      </div>
 
      <div class="text-center">
      <p>Name</p>
      <input type="text" name="emri" class="form-control text-center" value="{{$shpallje->emri}}">
      <p>Price</p>
      <input type="text" name="cmimi" class="form-control text-center" value="{{(float) $shpallje->cmimi}}">
      <p>Color</p>
      <input type="text" name="ngjyra" class="form-control text-center" value="{{$shpallje->ngjyra}}">
      <p>Screen size</p>
      <input type="text" name="size" class="form-control text-center" value="{{$shpallje->size}}">
      <p>CPU</p>
      <input type="text" name="cpu" class="form-control text-center" value="{{$shpallje->cpu}}">
      <p>GPU</p>
      <input type="text" name="gpu" class="form-control text-center" value="{{$shpallje->gpu}}">
      <p>Disk size</p>
      <input type="text" name="disk" class="form-control text-center" value="{{$shpallje->disk}}">
      <p>Battery</p>
      <input type="text" name="battery" class="form-control text-center" value="{{$shpallje->battery}}">
      <p>RAM</p>
      <input type="text" name="ram" class="form-control text-center" value="{{$shpallje->ram}}">
      <p>Year</p>
      <input type="text" name="viti" class="form-control text-center" value="{{$shpallje->viti}}">
      <p>Model</p>
      <select name="car_models_id">
      @foreach($modelet as $modeli)
      @if($modeli->id == $shpallje->car_models_id)
       <option selected value="{{$modeli->id}}">{{$modeli->modeli}}</option>
       @else
       <option value="{{$modeli->id}}">{{$modeli->modeli}}</option>
       @endif
       @endforeach
      </select>
      <br>
      <button class="btn btn-danger mb-2 mt-1">Delete costum added specs!</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-secondary" value="Change">
        </form>
        
</div>
</div>
</div>
</div>

  </div>
  @endif
  @endforeach
@endif
  </div>
</div>

</div>
</div>
@endsection

