@extends('layouts.shpalljet')
@section('login')

@endsection
@section('content')
<div  class="py-1 px-2 d-flex justify-content-center">
<form>
<ul class="list-inline">
<li class="list-inline-item"><input type="text"  name="name" placeholder="Search there..." size="33" class="form-control"></li>
<li class="list-inline-item"><select class="form-control" name="q">
      <option value="0">All</option>
      @foreach($catt as $c)
          <option value="{{$c->modeli}}">{{$c->modeli}}</option>
          @endforeach
          </select></li>
          <li class="list-inline-item"><input type="submit" class="btn btn-primary" value="Search"></li>
</ul>
</form>
  </div>
<div class="row text-center container">
<div class="col-md-4 col-xs-12 col-sm-12 col-12 col-lg-3 col-xl-3 mb-3">
<div class="list-group">
    

  @for($i = 1; $i < count($subcatt); $i++)
   @if($subcatt[$i]->car_models_id == $id)
   <a href="{{route('category',['q' => $subcatt[$i]->name,'price' => $price ,'name' => $name])}}" class="list-group-item list-group-item-action">
   {{$subcatt[$i]->name}}
   </a>
   @endif
 
  @endfor
</div>
<div id="filter" class="mt-2">
      <form method="get" action="{{route('category')}}">
          @csrf
          <label>Filter</label>
      <div class="mt-2"><label for="customRange3" class="form-label">Price range</label><input class="form-control text-center" name="price">
</div>
       <label>Category</label>
        <select name="q" id="model" class="form-control">
           
            @foreach($catt as $c)
          <option value="{{$c->modeli}}">{{$c->modeli}}</option>
          @endforeach
        </select>
      
       <input type="submit" class="btn btn-primary mt-2 mb-2" value="Filter">
</form>
</div>
        </div>
<div class="col-md-8 col-xs-12 col-sm-12 col-12 col-lg-9 col-xl-9">
<div class="page-content">
    <div class="products mb-3">
         <div class="row d-flex justify-content-center text-center">
             @foreach($uploads as $up)
       <div class="mb-2 col-6 col-md-4 col-lg-4 mx-2">
      <div class="product product-7 text-center">
                                            <figure class="product-media">
                                            
                                                <a href="{{route('shiko',$up->slug)}}">
                                                    <img src="{{$up->path}}" alt="Product image" class="product-image" id="productimage">
                                                </a>

                                              <!-- End .product-action-vertical -->

                                                <div class="product-action">
                                                   <a href="{{route('shto',$up->id)}}" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                               <!-- End .product-cat -->
                                                <h3 class="product-title"><a href="{{route('shiko',$up->slug)}}">{{$up->emri}}</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    {{$up->cmimi}} {{$curr}}
                                                </div>
                                                <div>
                                                 {{$up->ngjyra}}
                                                  </div>

                                             
                                            </div><!-- End .product-body -->
                                        </div>
           </div>
           @endforeach
      </div>
    </div>
    @if($uploads->count() > 1)
    <div class="d-flex justify-content-center">
    <div class="d-flex justify-content-center"><nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        @if($uploads->currentPage() > 1)
        <span> <a href="{{route('category',['page' => $uploads->currentPage() -1 , 'q' => $category])}}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"></span>
            @endif
                    « Previous
                </span> <a href="{{route('category',['page' => $uploads->currentPage() +1 , 'q' => $category])}}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    Next »
                </a></div> <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"><div><p class="text-sm text-gray-700 leading-5">
                
                </p></div> <div></div></div></nav></div>
                @endif
</div>
     </div>
</div>
  @endsection