@extends('layouts.shpalljet')
@section('login')

@endsection
@section('content')

<head>
<link rel="stylesheet" href="assets/css/style.css">
<title>{{config('app.name')}}</title>
</head>
<div class="container">
@if($errors->any())
<div class="text-center">
    {{ implode('', $errors->all(':message')) }}
</div>
@endif
@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {!! \Session::get('success') !!}
</div>
@endif

<body>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="POST" enctype="multipart/form-data" action="{{route('uploadp')}}">
                        {{csrf_field()}}
                            <h3 class="text-center text-info">Upload here</h3>
                <div class="text-center py-2 form-group" id="image">
    <input type="file" name="image" class="form-control-file">
    </div>
    <div class="text-center">
          <button class="btn btn-primary bg-primary" id="shto" onclick="shtofoto();return false;">Add another img!</button>
        </div>
  <input type="hidden" id="img" name="imgcnt">
  <input type="hidden" id="sp" name="spcnt">
    <br>
    <br>
                            <div class="form-group">
                                <label for="username" class="text-info">Title<span id="red"> *</span></label><br>
                                <input type="text" name="name" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                            <label class="text-info">Category<span id="red"> *</span></label><br>
                                <select name="model" class="form-control">
                                    @foreach($modelet as $model)
                                    <option value="{{$model->id}}">{{$model->modeli}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            <label class="text-info">Subcategory<span id="red"> *</span></label><br>
                                <select name="submodel" class="form-control">
                                    <option value="">None</option>
                                    @foreach($cat as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Price<span id="red"> *</span></label><br>
                                <input type="text" name="price"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Year<span id="red"> *</span></label><br>
                                <select name="year" class="form-control">
                                    @for($i = 2021; $i >= 1990; $i--)
                                    <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Color<span id="red"> *</span></label><br>
                                <input type="text" name="ngjyra"  class="form-control">
                            </div>
                            <div class="row">
                            <div class="col-12 mt-2" id="specs" style="display: none;">
                                <label class="text-info" id="other" style="display: none;">Other specs</label><br>
                                </div>
                                <div class="col-md-6 col-xs-12 col-sm-8 col-lg-8 col-xl-8 mt-2">
                                <label class="text-info">Add another spec(if needed)</label><br>
                                <input type="text" name="spec" id="spec" class="form-control" placeholder="ex Substance:plastic or Made in:China">
</div>
                                <div class="col-md-6 col-xs-12 col-sm-4 col-lg-4 col-xl-4 mt-2">
                              <button class="btn btn-primary" style="margin-top: 35px;" onclick="shtospec();return false;">Add spec</button>
</div>
                            </div>
                            <div class="form-group">
                                <label  class="text-info">Description<span id="red">(max 2000 letters)</span></label><br>
                                <textarea type="text" name="description"  class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                               <br>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Upload">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
var cnt = 0;
var sp = 0;
function shtofoto(){
    if(cnt <= 2){
var image = document.getElementById('image');
var input = document.createElement('input');
input.type = "file";
input.name = "image" + cnt;
input.className = "form-control-file";
cnt++;
var img = document.getElementById('img').value = cnt;

image.appendChild(input);}

}
function shtospec(){
    var specs = document.getElementById('specs');
var input = document.createElement('input');
input.type = "text";
input.name = "spec" + sp;
input.className = "form-control mt-1";
input.value = document.getElementById('spec').value;
sp++;
document.getElementById('other').style.display = "inline";
document.getElementById('specs').style.display = "inline";
document.getElementById('sp').value = sp;
document.getElementById('spec').value = "";

specs.appendChild(input);
}
</script>



@endsection