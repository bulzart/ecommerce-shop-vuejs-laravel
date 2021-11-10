@extends('layouts.shpalljet')
@section('login')

@endsection
@section('content')


<body>
<div class="container">
@if($errors->any())
<div class="text-center">
    {{ implode('', $errors->all(':message')) }}
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {!! \Session::get('success') !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div id="login">
        <div class="container">
            <br><br><br><br>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post" action="{{route('insertp')}}">
                        {{csrf_field()}}
                            <h3 class="text-center text-info">Insert category</h3>
                            <div class="form-group text-center">
                                <input type="text" name="name" class="form-control text-center" placeholder="TV,Gaming Desktops,Laptops">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Insert">
                            </div>
                        </form>
                        <form id="login-form" class="form" method="post" action="{{route('insertsub')}}">
                        {{csrf_field()}}
                            <h3 class="text-center text-info">Insert subcategory</h3>
                            <span class="text-center">Category</span>
                            <select name="model" class="form-control">
                                @if($models != null)
                                    @foreach($models as $model)
                                    <option class="form-group text-center" value="{{$model->id}}">{{$model->modeli}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            <div class="form-group text-center">
                                <input type="text" name="name" class="form-control text-center" placeholder="Subcategory...">
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Insert">
                            </div>
                        </form>
                        <form id="login-form" class="form" method="post" action="{{route('deletep')}}">
                        {{csrf_field()}}
                            <h3 class="text-center text-info">Delete category</h3>
                            <div class="form-group text-center">
                            <select name="model" class="form-control">
                                @if($models != null)
                                    @foreach($models as $model)
                                    <option class="form-group text-center" value="{{$model->id}}">{{$model->modeli}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <br>
                            <div class="form-group text-center">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Delete">
                            </div>
                        </form>
                        <form id="login-form" class="form" method="post" action="{{route('delsub')}}">
                        {{csrf_field()}}
                            <h3 class="text-center text-info">Delete subcategory</h3>
                            <div class="form-group text-center">
                            <select name="model" class="form-control">
                                @if($models != null)
                                    @foreach($sub as $s)
                                    <option class="form-group text-center" value="{{$s->id}}">{{$s->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <br>
                            <div class="form-group text-center">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Delete">
                            </div>
                        </form>
                        <form id="login-form" class="form" method="post" action="{{route('changecurr')}}">
                        {{csrf_field()}}
                            <h3 class="text-center text-info">Select page currency</h3>
                            <div class="form-group text-center">
                            <select name="curr" class="form-control text-center">
                                @if($curr != null)<option selected value="{{$curr->currency}}">{{$curr->currency}}</option>@endif
                            <option value="$ usd">$</option>
                            <option value="₳ aud">₳</option>
                            <option value="£ gbp">£</option>
                            <option value="€ eur">€</option>
                            <option value="$ cad">$ cad</option>
                            <option value="¥ jpy">¥</option>
                            <option value="₣ chf">₣</option>
                            <option value="﷼ sar">﷼</option>
    
   
                               
                                </select>
                                <br>
                            <div class="form-group text-center">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Change">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

