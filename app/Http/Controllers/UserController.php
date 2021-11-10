<?php

namespace App\Http\Controllers;



use Stripe;
use App\Models\subcategory;
use Illuminate\Support\Facades\Mail;
use App\Mail\Testmail;
use App\Models\Cart;
use App\Models\currency;
use App\Models\Order;
use App\Models\Admin;
use App\Models\specs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\carModels;
use App\Models\filesDb;
use App\Models\Perdoruesi;
use App\Models\Upload;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\Jobs\SendEmail;
use App\Models\CCart;
use App\Models\Images;
use Currencies;
use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Cache\Store;
use League\CommonMark\Inline\Element\Strong;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;
use Uploads;
use View;
use function Symfony\Component\String\b;

class UserController extends Controller
{
    public function subcategories(){
        return subcategory::all();
    }
    public function resizeImage($image, $requiredSize) {
        $width = $image->width();
        $height = $image->height();
    
        // Check if image resize is required or not
        if ($requiredSize >= $width && $requiredSize >= $height) return $image;
    
        $newWidth;
        $newHeight;
    
        $aspectRatio = $width/$height;
        if ($aspectRatio >= 1.0) {
            $newWidth = $requiredSize;
            $newHeight = $requiredSize / $aspectRatio;
        } else {
            $newWidth = $requiredSize * $aspectRatio;
            $newHeight = $requiredSize;
        }
    
    
        $image->resize($newWidth, $newHeight);
        return $image;
    }
    public function delsub(Request $request){
        
            if(Auth::guard('perdoruesit')->user()->role == 'admin'){
         
    
            subcategory::where('id',$request->input('model'))->delete();
            return redirect()->back()->with('success','Subcategory deleted successfully!');}
        
    }

    public function insertsub(Request $request){
        if(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role == 'admin'){
            $request->validate([
                'name' => 'required',
                'model' => 'required|exists:car_models,id'
            ]);
            $model = new subcategory();
            $model->name = filter_var($request->input('name'),FILTER_SANITIZE_STRING);
            $model->car_models_id = filter_var($request->input('model'),FILTER_SANITIZE_NUMBER_INT);
            $model->save();
            return redirect()->back()->with('success','Subcategory inserted successfully!');
        }
    }
    
    public $icnt = 0;
   
    public function category(Request $req,$page = 0){
        $price = 999999.99;
        if(carModels::where('modeli',$req->get('q'))->first() == null && subcategory::where('name',$req->get('q'))->first() == null){
            return redirect()->route('home');
        }
        if($req->get('price') != null){
            $price = filter_var($req->get('price'),FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $name = filter_var($req->get('name'),FILTER_SANITIZE_STRING);

        if($req->get('name') == null){
        $catt = carModels::all();
        $subcatt = subcategory::all();
        $category = filter_var($req->get('q'),FILTER_SANITIZE_STRING);
        $cat = subcategory::where('name',$category)->first();
if($cat != null){
   
    $uploads = Upload::where('subcategory_id',$cat->id)->whereBetween('cmimi',[0,$price])->paginate(12);
    $id = subcategory::where('id',$cat->id)->first()->car_models_id;
    }
    
        
else{
    $cat = carModels::where('modeli',$category)->first();
    $id = $cat->id;
    $uploads = Upload::where('car_models_id',$cat->id)->whereBetween('cmimi',[0,$price])->paginate(12);
    
}
        $curr = currency::first()->currency;

        return view('category',compact('uploads','curr','category','catt','subcatt','id','price','name'));}
        else{
            $catt = carModels::all();
            $subcatt = subcategory::all();
            $category = filter_var($req->get('q'),FILTER_SANITIZE_STRING);
            $cat = subcategory::where('name',$category)->first();
    if($cat != null){
       
        $uploads = Upload::where('subcategory_id',$cat->id)->whereBetween('cmimi',[0,$price])->where('emri','like','%'.filter_var($req->get('name'),FILTER_SANITIZE_STRING).'%')->paginate(12);
        $id = subcategory::where('id',$cat->id)->first()->car_models_id;
        }
        
            
    else{
        $cat = carModels::where('modeli',$category)->first();
        $id = $cat->id;
        $uploads = Upload::where('car_models_id',$cat->id)->whereBetween('cmimi',[0,$price])->where('emri','like','%'.filter_var($req->get('name'),FILTER_SANITIZE_STRING).'%')->paginate(12);
        
    }
            $curr = currency::first()->currency;
    
            return view('category',compact('uploads','curr','category','catt','subcatt','id','price','name'));
        }
       
    }

    public function myprofilep(Request $request){
        $request->validate([
            'adminval' => 'required|exists:perdoruesit,id'
        ]);
        $id = filter_var($request->adminval,FILTER_SANITIZE_NUMBER_INT);
        $user = Perdoruesi::where('id',$id)->first();
        return view('myprofile',compact('user'));
    }
public function updateprofile(Request $request){
    $perdorues = Perdoruesi::find(Auth::guard('perdoruesit')->user()->id);
    if(Auth::guard('perdoruesit')->user()->role == 'admin' || $perdorues->id == Auth::guard('perdoruesit')->user()->id){
    $request->validate([
        'email' => 'required',
        'name' => 'required',
        
    ]);
$name = filter_var($request->input('name'),FILTER_SANITIZE_STRING);
$email = filter_var($request->input('email'),FILTER_SANITIZE_STRING);
$tel = filter_var($request->input('tel'),FILTER_SANITIZE_STRING);
$perdorues->name = $name;
if($perdorues->email != $email){
$perdorues->email = $email;}
if(isset($request->adminornot)){
    if(Auth::guard('perdoruesit')->check() && Auth::guard('perdoruesit')->user()->role == 'admin'){
        if($request->input('adminornot') == 'admin'){
            $perdorues->role = 'admin';
        }
        elseif ($request->input('adminornot') == 'mod'){
            $perdorues->role = 'mod';
        }
        else{
            $perdorues->role = 'user';
        }
    }
}
if(strlen($request->input('password')) > 5){
   
    $perdorues->password = Hash::make(filter_var($request->input('password'),FILTER_SANITIZE_STRING));}

$perdorues->tel = $tel;
$perdorues->save();
return redirect()->back()->with('success','User updated successfully');
    }
    else{
        redirect()->back()->with('success','No access for this action!');
    }
}
    public function myprofile($id = null){
        if($id == null){
        $user = Perdoruesi::where('id',Auth::guard('perdoruesit')->user()->id)->first();
      
        return view('myprofile',compact('user'));}
        else{
            $user = Perdoruesi::where('id',$id)->first();
            return view('myprofile',compact('user'));
        }
    }
    public function myorders(){
        if(Auth::guard('perdoruesit')->check()){
            $arrcnt = 0;
            $orders = Order::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->orderBy('created_at','desc')->get();
            $porosia = [];
         
            if(count($orders) > 0){
                for($i = 0; $i < count($orders); $i++){
                    $arrcnt = count($orders);
                    $porosia[$i] = new CCart();
                   $porosia[$i]->items = (array) json_decode($orders[$i]->items);
                }
                }
                elseif(count($orders) == 1){
                    $porosia[0] = new CCart();
                    $porosia[0]->items = (array) json_decode($orders[0]->items);
            }
           
            
          $cnt = 0;
        
            return view('myorders',compact('orders','porosia','cnt','arrcnt'));
        }
    }
    public function deleteall(){
        $cart = Session::get('cart');
        return $cart->deleteall();
    }
    public function signup(){
        return view('signup');
    }
    public function signupp(Request $request){
        $request->validate([
            'email' => 'required|unique:perdoruesit',
            'name' => 'required',
            'password' => 'required|min:6',
            'tel' => 'required',
            
        ]);
    $name = filter_var($request->input('name'),FILTER_SANITIZE_STRING);
    $email = filter_var($request->input('email'),FILTER_SANITIZE_STRING);
    $tel = filter_var($request->input('tel'),FILTER_SANITIZE_STRING);
    $password = filter_var($request->input('password'),FILTER_SANITIZE_SPECIAL_CHARS);
    $perdorues = new Perdoruesi();
    $perdorues->name = $name;
    $perdorues->email = $email;
    $perdorues->password = Hash::make($password);
    $perdorues->tel = $tel;
    $perdorues->save();
    return redirect()->back()->with('success','You got signed up successfully');
       
    }
    public function returnhash(){
        $hash = Hash::make("123456");
        return $hash;
    }
    public function curr(){
     return $data = currency::first()->currency;
    }

    public function orders(){
        if(Auth::guard('perdoruesit')->user()->role == 'admin'){
        $arrcnt = 0;
        $orders = Order::where('perfunduar',0)->orderBy('created_at','desc')->get();
        $porosia = [];
     
        if(count($orders) > 0){
            for($i = 0; $i < count($orders); $i++){
                $arrcnt = count($orders);
                $porosia[$i] = new CCart();
               $porosia[$i]->items = (array) json_decode($orders[$i]->items);
            }
            }
            elseif(count($orders) == 1){
                $porosia[0] = new CCart();
                $porosia[0]->items = (array) json_decode($orders[0]->items);
        }
       
        
      $cnt = 0;
    
        return view('orders',compact('orders','porosia','cnt','arrcnt'));
    }
    }

    public function datenow(){
        return date("Y-m-d H:i:s");
    }
    public function search(){
        $models = carModels::all();
        return view('search',compact('models'));
    }

    public function listorders(Request $request){
        if(Auth::guard('perdoruesit')->user()->role == 'admin'){
        $arrcnt = 0;
        $from = date('Y-m-d', strtotime($request->input('from')));
        $n = date('Y-m-d', strtotime($request->input('now')));
        $now = date('Y-m-d',strtotime($n . "+1 days"));
        $orders = Order::whereBetween('created_at',[$from,$now])->where('perfunduar',0)->get();
    
        $porosia = [];
      
     
        if(count($orders) > 1){
            for($i = 0; $i < count($orders); $i++){
                $arrcnt = count($orders);
                $porosia[$i] = new CCart();
               $porosia[$i]->items = (array) json_decode($orders[$i]->items);
            }
            }
            elseif (count($orders) == 1){  
                $porosia[0] = new CCart();
               $arrcnt = 1;
                $porosia[0]->items = (array) json_decode($orders[0]->items);
        }
        else{
            $arrcnt = 0;
        }
      
      $cnt = 0;
        return view('orders',compact('orders','porosia','cnt','arrcnt'));}
    }
    public function listdoneorders(Request $request){
        if(Auth::guard('perdoruesit')->user()->role == 'admin'){
        $arrcnt = 1;
        $from = date('Y-m-d', strtotime($request->input('from')));
        $n = date('Y-m-d', strtotime($request->input('now')));
        $now = date('Y-m-d',strtotime($n . "+1 days"));
        $orders = Order::where('perfunduar',1)->whereBetween('created_at',[$from,$now])->get();
    
        $porosia = [];
      
     
        if(count($orders) > 1){
            for($i = 0; $i < count($orders); $i++){
                $arrcnt = count($orders);
                $porosia[$i] = new CCart();
               $porosia[$i]->items = (array) json_decode($orders[$i]->items);
            }
            }
            elseif (count($orders) == 1){  
                $porosia[0] = new CCart();
               
                $porosia[0]->items = (array) json_decode($orders[0]->items);
        }
        else{
            $arrcnt = 0;
        }
      
      $cnt = 0;
        return view('doneorders',compact('orders','porosia','cnt','arrcnt'));}
    }

    public function doneorders(){
        if(Auth::guard('perdoruesit')->user()->role == 'admin'){
        $arrcnt = 0;
        $orders = Order::where('perfunduar',1)->orderBy('created_at','desc')->get();
        $porosia = [];
     
        if(count($orders) > 0){
            for($i = 0; $i < count($orders); $i++){
                $arrcnt = count($orders);
                $porosia[$i] = new CCart();
               $porosia[$i]->items = (array) json_decode($orders[$i]->items);
            }
            }
            elseif(count($orders) == 1){
                $porosia[0] = new CCart();
                $porosia[0]->items = (array) json_decode($orders[0]->items);
        }
       
        
      $cnt = 0;
    
        return view('doneorders',compact('orders','porosia','cnt','arrcnt'));}
    }
    public function perfunduar($id){
        if(Auth::guard('perdoruesit')->user()->role == 'admin'){
        $order = Order::where('id',$id)->first();
$order->perfunduar = 1;
$order->save();
return redirect()->back()->with('success',"Order was noted as done!");}
    }
    public function undone($id){
        if(Auth::guard('perdoruesit')->user()->role == 'admin'){
        $order = Order::where('id',$id)->first();
$order->perfunduar = 0;
$order->save();
return redirect()->back()->with('success',"Order was undoned successfully!");}
    }
    public function delorder($id){
        if(Auth::guard('perdoruesit')->user()->role == 'admin'){
        Order::where('id',$id)->delete();
        return redirect()->back()->with('success',"Order was deleted successfully!");}
    }
        public function ndrysho(Request $request,$id){
            
         
            $path = '';
        $path2 = '';
        $path3 = '';
    

        $request->validate([
            'emri' => 'required',
            'viti' => 'required',
            'cmimi' => 'required',
            'car_models_id' => 'required|exists:car_models,id',
            'ngjyra' => 'required',
        ]);
        $post = Upload::findOrFail($id);
        $rand = rand(0,99999999);
        $randstring = $this->randstring();
        
        if(Auth::guard('perdoruesit')->user()->role == 'admin' || $post->perdoruesi_id == Auth::guard('perdoruesit')->user()->id){
        $path = '';
        $cnt = 0;
        
        if($request->file('image') != null){ $imazhi =  Image::make($request->file('image'))->encode('webp');
         Storage::disk('uploads')->delete(str_replace('uploads','/',$post->path));
         $imazhi = $this->resizeImage($imazhi,860);
         $imazhi->save('uploads'.'/'.$rand.$randstring.str_replace($request->file('image')->getClientOriginalExtension(),'',$request->file('image')->getClientOriginalName()).'webp');}
     
    
            
            
            $imggg = new Images();
           $imggg->url = (array) json_decode($post->url);
           
    
            for($i = 0; $i<= count($imggg->url); $i++){
                if($request->file("image".$i) != null){
                    $imazhi =  Image::make($request->file('image'.$i))->encode('webp');

                    $imazhi = $this->resizeImage($imazhi,860);
                    $imazhi->save('uploads'.'/'.$rand.$randstring.str_replace($request->file('image'.$i)->getClientOriginalExtension(),'',$request->file('image'.$i)->getClientOriginalName()).'webp');
                    $imgg->addimg($i,"uploads/".$rand.$randstring.str_replace($request->file('image'.$i)->getClientOriginalExtension(),'',$request->file('image'.$i)->getClientOriginalName()).'webp',$imazhi->width(),$imazhi->height());
                       
                }
            }
        
        $kerri = Upload::find($id);
        $kerri->url = json_encode($imggg->url);
        $kerri->emri = filter_var($request->input('emri'),FILTER_SANITIZE_STRING);
        if($request->file('image') != null){
        $kerri->path = 'uploads'.'/'.$rand.$randstring.str_replace($request->file('image')->getClientOriginalExtension(),'',$request->file('image')->getClientOriginalName()). 'webp';}
        $kerri->car_models_id = (int)$request->input('car_models_id');
        $kerri->ngjyra = $request->input('ngjyra');
        $kerri->cmimi = (float) $request->input('cmimi');
        $kerri->pershkrimi = filter_var($request->input('description'),FILTER_SANITIZE_STRING);
        $kerri->viti = filter_var($request->input('viti'),FILTER_SANITIZE_NUMBER_INT);
        $kerri->save();return redirect()->back()->with('success','Post was changed successfully!');}
        else{return redirect()->back()->with('success','Not authenticated to do this action');

        }
        

        }
        public function shto(Request $request,$id){
            $product = Upload::where('id',$id)->first();
            if(Auth::guard('perdoruesit')->check()){
                $karta = Cart::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->first();
                if ($karta === null){
                    $old = null;
                    $cart = new CCart($old);
                    $cart->addtocart($id);
                    $karta = new Cart();
                    $karta->items = json_encode($cart->items);
                    $karta->sasia = $cart->sasia;
                    $karta->perdoruesi_id = Auth::guard('perdoruesit')->user()->id;
                    $karta->total += $product->cmimi;
                    $karta->save();
                   
                }                
                else{
                    $old = null;
                    $cart = new CCart($old);
                    $cart->items = (array) json_decode($karta->items);
                    $cart->cmimi = $karta->cmimi;
                    $cart->sasia = $karta->sasia;
                    $cart->addtocart($id);
                    $karta->items = json_encode($cart->items);
                    $karta->sasia = $cart->sasia;
                    $karta->perdoruesi_id = Auth::guard('perdoruesit')->user()->id;
                    $karta->total += $product->cmimi;
                    $karta->save();
                  
                    
            }
            
            }
            else{
                $carta = Session::get('cart');
                $cart = new CCart($carta);
                $cart->addtocart($id);
                Session::put('cart',$cart);
                Session::put('sasia',$cart->sasia);
            }
            return redirect()->back()->with('shto',"Product was added to cart successfully!");
            }
            
            public function deleteprod(Request $request,$id)
    {
        if(Auth::guard('perdoruesit')->check()){
            $cart = new CCart();
            $carta =  Cart::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->first();
            
            $cart->items = (array) json_decode($carta->items);
            $cart->sasia = $carta->sasia;
            $cart->total = $carta->total;
            $cart->deleteprod($id);
           $carta->items = $cart->items;
           $carta->total = $cart->total;
           $carta->sasia = $cart->sasia;
           $carta->save();     
          
           return redirect()->back();       

        }
        else{
        $cart = $request->session()->get('cart');
        $cart->deleteprod($id);
        $request->session()->put('cart',$cart);
        $request->session()->put('sasia',$cart->sasia);
        return redirect()->back()->with('success',"Product was deleted successfully!");}
    }
    public function porosit(Request $request){
       
       
        $request->validate([
            'emri' => 'required',
            'adresa' => 'required',
            'shteti' => 'required',
            'nr' => 'required'
            ]);
         
            date_default_timezone_set("Europe/Berlin");
        if(Auth::guard('perdoruesit')->check()){
          
        $cart = new CCart();
        $carta = Cart::where('perdoruesi_id',Auth::guard("perdoruesit")->user()->id)->first();
        $cart->items = (array) json_decode($carta->items);
        $cart->sasia = $carta->sasia;
        $cart->total = $carta->total;
            
        $emri = filter_var($request->input('emri'),FILTER_SANITIZE_STRING);
        $nr = filter_var($request->input('nr'),FILTER_SANITIZE_NUMBER_INT);
         $shteti = filter_var($request->input('shteti'),FILTER_SANITIZE_STRING);
        $adresa = filter_var($request->input('adresa'),FILTER_SANITIZE_STRING);
        $mesazh = filter_var($request->input('email'),FILTER_SANITIZE_STRING);
        $zip = filter_var($request->input('zip'),FILTER_SANITIZE_NUMBER_INT);

            $order = new Order();
            $order->items = json_encode($cart->items);
            $order->total = $cart->total;
            $order->sasia = $cart->sasia;
            $order->emri = $emri;
            $order->tel = $nr;
            $order->shteti = $shteti;
            $order->adresa = $adresa;
            $order->mesazh = $mesazh;
            $order->zip = $zip;
            $order->perdoruesi_id = Auth::guard('perdoruesit')->user()->id;
            $order->save();
          
        Cart::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->delete();
        return redirect()->route('shporta')->with('porosi',"Order took place successfully!");
        }
        else{
            $cart = Session::get('cart');
            $emri = filter_var($request->input('emri'),FILTER_SANITIZE_STRING);
            $nr = filter_var($request->input('nr'),FILTER_SANITIZE_NUMBER_INT);
             $shteti = filter_var($request->input('shteti'),FILTER_SANITIZE_STRING);
            $adresa = filter_var($request->input('adresa'),FILTER_SANITIZE_STRING);
            $mesazh = filter_var($request->input('email'),FILTER_SANITIZE_STRING);
            $zip = filter_var($request->input('zip'),FILTER_SANITIZE_NUMBER_INT);
            $order = new Order();
            $order->items = json_encode($cart->items);
            $order->total = $cart->total;
            $order->sasia = $cart->sasia;
            $order->emri = $emri;
            $order->tel = $nr;
            $order->shteti = $shteti;
            $order->adresa = $adresa;
            $order->mesazh = $mesazh;
            $order->zip = $zip;
            $order->save();
          $cart->del();
          Session::put('cart');
          Session::put('sasia',$cart->sasia);
      return redirect()->route('shporta')->with('porosi','Order took place successfully');
        }
    }

    public function download($file){
        if(Storage::disk('uploads')->exists($file)){
            return Storage::disk('uploads')->download($file);
        }
        else{
            return "Jo";
        }
    }

   
    
    
    public function checkout(){
        $curr = currency::first()->currency;
        if(Auth::guard('perdoruesit')->check()){
            $carta = Cart::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->first();
            if($carta != null && $carta->sasia > 0){
            $cart = new CCart();
            $cart->items = (array) json_decode($carta->items);
            $cart->total = $carta->total;
            $cart->sasia = $carta->sasia;
            $total = $carta->total;
            return view('porosit',compact('cart','curr','total'));}
            else{
                return redirect()->route('home');
            }
            
        }
        else{
            $cart = Session::get('cart');
            if($cart == null || $cart->total == 0){
                return redirect()->route('home');
            }
            else{
            $total = $cart->total;
            return view('porosit',compact('cart','curr','total'));}
        }
    }
public function minus(Request $request,$id){
    if(!Auth::guard('perdoruesit')->check()){
    $cart = $request->session()->get('cart');
    $cart->minus($id);
    $request->session()->put('cart',$cart);
    Session::put('sasia',$cart->sasia);}
    else{
        $carta = Cart::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->first();
        $cart = new CCart();
        $cart->items = (array) json_decode($carta->items);
        $cart->total = $carta->total;
        $cart->sasia = $carta->sasia;
       $cart->minus($id);
       $karta = Cart::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->first();
      
       $karta->items = $cart->items;
       $karta->total = $cart->total;
       $karta->save();
    

    }
    return redirect()->back();

}
public function shporta(){
    if(Auth::guard('perdoruesit')->check()){
        $carta = Cart::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->first();
        $cart = new CCart();
        if(isset($carta->items)){
        $cart->items = (array) json_decode($carta->items);}
        else
        {
            $cart->items = null;
        }
        if(isset($carta->total)){
        $cart->total = $carta->total;}
        else{
            $cart->total = 0;
        }
        if(isset($carta->sasia)){
        $cart->sasia = $carta->sasia;}
        else{
            $cart->sasia = 0;
        }
        $curr = currency::first();
        return view('shporta',compact('cart','curr'));
    }
    else{
        $cart = Session::get('cart');
        $curr = currency::first();
        return view('shporta',compact('cart','curr'));
    }

}
    public function showcart(){
        $cart = Session::get('cart');
        dd($cart);
    }
    public function isadmin(){
if(Auth::guard('perdoruesit')->check()) return 'true';
else return 'false';
    }

   
public function searchp(Request $request){
   $data = "";
   $price = filter_var($request->get('price'),FILTER_SANITIZE_SPECIAL_CHARS);
    if($request->get('model') == 0) { if($request->get('name') === ''){
        $uploads = Upload::orderBy('created_at','desc')->whereBetween('cmimi',[0,$price])->get();
        
        return $data = $uploads;
    }
else{
  
    $uploads = Upload::where('emri','like','%'.filter_var($request->get('name'),FILTER_SANITIZE_STRING).'%')->orderBy('created_at','desc')->whereBetween('cmimi',[0,$price])->get();
    return $data = $uploads;
}
}
    else{
        $id = $request->get('model');
        
    $uploads = Upload::where('emri','like','%'.filter_var($request->get('name'),FILTER_SANITIZE_STRING).'%')->where('car_models_id',$id)->orderBy('created_at','desc')->whereBetween('cmimi',[0,$price])->get();return $data = $uploads;}


}
public function showindex(){
    $hot = Upload::orderBy('count','desc')->get()->take(6);
   $cart = Session::get('cart');
   $curr = currency::first()->currency;
  
    return view('layouts/indext',compact('hot','cart','curr'));
}
public function hotnow(){
    return $data = Upload::orderBy('count','desc')->get()->take(8);
}

public function indexdata(){
    return Upload::orderBy('created_at','desc')->paginate(15);
}
public function takefromuploads(){
    return Upload::orderBy('created_at','desc')->take(12)->get(); 

}
    public function shiko(Upload $upload){
        $images = (array) json_decode($upload->url);
        $upload->count++;
        $upload->save();
        
        $modelet = carModels::all();
        $curr = currency::first();
        $cart = Session::get('cart');
        if($cart == null) $cart = 0; else $cart = $cart->sasia;
        $specs = new specs();
        if($upload->specs != null){
           
        $specs->items = (array) json_decode($upload->specs);}
       
        $related = $upload->model->related;
        return view('product',compact('upload','modelet','images','related','curr','cart','specs'));
    }
   
    public function surfreturn()
{
    dd(Route::getCurrentRoute()->getActionName());
    $name = Session::get('name');
    $model = Session::get('model');

    if($model == 0) { if($name === ''){
        $uploads = Upload::all();
        return view('surf',compact('uploads'));
    }
else{
    $uploads = Upload::where('emri','like','%'.$name.'%')->get();
    return view('surf',compact('uploads'));
}
}
    else{
        $id = $model;
    $uploads = Upload::where('emri','like','%'.$name.'%')->where('car_models_id',$id)->get();return view('surf',compact('uploads'));}
    
}
    public function insert(){
        $models = carModels::all();
        $curr = currency::first();
        $sub = subcategory::all();
        return view('insertmodel',compact('models','curr','sub'));
    }
    public function insertp(Request $request){
        if(Auth::guard('perdoruesit')->user()->role == 'admin'){
   $request->validate([
       'name' => 'required',
   ]);
   $model = new carModels();
   $model->modeli = filter_var($request->input('name'),FILTER_SANITIZE_STRING);
   $model->save();
   return redirect()->back()->with('success','Category inserted successfully!');
        }
    }
    public function deletep(Request $request){
        if(Auth::guard('perdoruesit')->user()->role == 'admin'){
        $request->validate([
            'model' => 'required|exists:car_models,id'
        ]);

        carModels::where('id',$request->input('model'))->delete();
        return redirect()->back()->with('success','Category deleted successfully!');}
    }
    
public function login(Request $request){
$email = filter_var($request->input('email'),FILTER_SANITIZE_EMAIL);
$password = filter_var($request->input('password'),FILTER_SANITIZE_STRING);
  
    if (Auth::guard('perdoruesit')->attempt(['email' => $email,'password'=> $password])){
        $perdorues = Perdoruesi::where('email',$email)->first();
        $perdorues->online = 1;
        $perdorues->save();
        return redirect()->route('home');
    }
    else{
        return redirect()->back()->with('wrong','Wrong user name or password');
    }
}

public function logout(){
    if(Auth::guard('perdoruesit')->check()){
        $perdoruesi = Perdoruesi::where('id',Auth::guard('perdoruesit')->user()->id)->first();
        $perdoruesi->online = 0;
        $perdoruesi->save();
        Auth::guard('perdoruesit')->logout();}
        return redirect()->route('home');


        
    
    return redirect()->route('home');
}


public function shpalljet($id){
    if(Auth::guard('perdoruesit')->check()){
    if($id == Auth::guard('perdoruesit')->user()->id){
        $shpalljet = Upload::where('perdoruesi_id',$id)->orderBy('created_at','desc')->get();
        $images = [];
      
        $modelet = carModels::all();
        return view('shpalljet',compact('modelet','shpalljet','images'));
    }
}
}

public function returnmodels(){
    $data = "";
    return $data = carModels::all();
}

public function uploadg(){
    if(Auth::guard('perdoruesit')->user()->role == 'admin' || Auth::guard('perdoruesit')->user()->role == 'mod'){
    $modelet = carModels::all();
    $cat = subcategory::all();

    return view('upload',compact('modelet','cat'));}
   

}
public function fshije($id){
    $upload = Upload::find($id);
    if($upload->perdoruesi_id == Auth::guard('perdoruesit')->user()->id || Auth::guard('perdoruesit')->user()->role == 'admin'){
    $upload->delete();
    return redirect()->back()->with('deleted','Post was deleted successfully!');}
    else{
        redirect()->back();
    }
}
public function allposts(){
    
    if(Auth::guard('perdoruesit')->user()->role == 'admin'){
            $shpalljet = Upload::all();
            $images = [];
            $modelet = carModels::all();
            return view('allposts',compact('modelet','shpalljet','images'));}
            if(Auth::guard('perdoruesit')->user()->role == 'mod'){
                $shpalljet = Upload::where('perdoruesi_id',Auth::guard('perdoruesit')->user()->id)->get();
                $images = [];
                $modelet = carModels::all();
                return view('allposts',compact('modelet','shpalljet','images'));
            }
}

public function addadmin(){
    $admins = Perdoruesi::all();
    
        return view('addadmin',compact('admins'));

}
public function deladmin(Request $req){
    if(Auth::guard('perdoruesit')->user()->role == 'admin'){
    Perdoruesi::where('id',$req->input('adminval'))->delete();
    return redirect()->back()->with('success','Admin was deleted successfully');}
}

public function addadminp(Request $request){
    if(Auth::guard('perdoruesit')->user()->role == 'admin'){
    $request->validate([
        'email' => 'required|unique:perdoruesit',
        'name' => 'required',
        'password' => 'required|min:6',
        'adminornot' => 'required',        
    ]);
$name = filter_var($request->input('name'),FILTER_SANITIZE_STRING);
$email = filter_var($request->input('email'),FILTER_SANITIZE_STRING);
$admin = filter_var($request->input('adminornot'),FILTER_SANITIZE_STRING);
$tel = filter_var($request->input('tel'),FILTER_SANITIZE_STRING);
$password = filter_var($request->input('password'),FILTER_SANITIZE_SPECIAL_CHARS);
$company_name = filter_var($request->input('company_name'),FILTER_SANITIZE_STRING);
$perdorues = new Perdoruesi();
if($request->input('adminornot') == 'admin'){
    $perdorues->role = 'admin';
}
else{
    $perdorues->role = "mod";
}
$perdorues->name = $name;
$perdorues->email = $email;
$perdorues->password = Hash::make($password);
$perdorues->company_name = $company_name;
$perdorues->save();
return redirect()->back()->with('success','Admin was added successfully');}
}
public function loging(){
    if(!Auth::guard('perdoruesit')->check()){
    return view('loging');}
    else{
        return redirect()->route('home');
    }
}
public function randomcategories(){
    return subcategory::inRandomOrder()->limit(6)->get();

}
function randstring() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
  $n = 5;
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
  
    return $randomString;
}

    public function uploadp(Request $request){
        if(Auth::guard('perdoruesit')->user()->role == 'admin' || Auth::guard('perdoruesit')->user()->role == 'mod'){
   $request->validate([

    'name' => 'required',
    'year' => 'required',
    'price' => 'required',
    'model' => 'required|exists:car_models,id',
    'submodel' => 'required|exists:subcategories,id',
    'image' => 'required|mimes:webp,jpg,png,jpeg,jp2',
    'description' => 'max:2000'
    
   ]);
   $specs = new specs();

 
   $rand = rand(0,99999999);
   $randstring = $this->randstring();


   for($i = 0; $i< $request->input('spcnt'); $i++){
 $specs->addspec(filter_var($request->input('spec'.$i),FILTER_SANITIZE_STRING));
   }
   
        $path = '';
           $cnt = 0;
            $imazhi =  Image::make($request->file('image'))->encode('webp');
            $imazhi = $this->resizeImage($imazhi,860);
               $imazhi->save('uploads'.'/'.$rand.$randstring.str_replace($request->file('image')->getClientOriginalExtension(),'',$request->file('image')->getClientOriginalName()).'webp');
        
        $imgg = new Images();
        for($i = 0; $i<= $request->input('imgcnt'); $i++){
            if($request->file("image".$i) != null){
                $imazhi =  Image::make($request->file('image'.$i))->encode('webp');
                $imazhi = $this->resizeImage($imazhi,720);
                   $imazhi->save('uploads'.'/'.$rand.$randstring.str_replace($request->file('image'.$i)->getClientOriginalExtension(),'',$request->file('image'.$i)->getClientOriginalName()).'webp');
                   $imgg->addimg($i,"uploads/".$rand.$randstring.str_replace($request->file('image'.$i)->getClientOriginalExtension(),'',$request->file('image'.$i)->getClientOriginalName()).'webp',$imazhi->width(),$imazhi->height());
                   $cnt++;
            }
        }
          
           
        $kerri = new Upload();
    $kerri->cnt = $cnt;
        $kerri->url = json_encode($imgg->url);
        if($request->input('type') == 'TB'){
            $kerri->disk = filter_var($request->input('disk'),FILTER_SANITIZE_NUMBER_INT) . 'TB';
        }
        elseif($request->input('type') == 'GB'){
            $kerri->disk = filter_var($request->input('disk'),FILTER_SANITIZE_NUMBER_INT) . 'GB';
        }
        elseif($request->input('type') == 'MB'){
            $kerri->disk = filter_var($request->input('disk'),FILTER_SANITIZE_NUMBER_INT) . 'MB';
        }
        $kerri->emri = filter_var($request->input('name'),FILTER_SANITIZE_STRING);
        $kerri->path = 'uploads'.'/'.$rand.$randstring.str_replace($request->file('image')->getClientOriginalExtension(),'',$request->file('image')->getClientOriginalName()). 'webp';
        $kerri->car_models_id = (int)$request->input('model');
        $kerri->subcategory_id = (int)$request->input('submodel');
        $kerri->ngjyra = $request->input('ngjyra');
        $kerri->cmimi = filter_var($request->input('price'),FILTER_VALIDATE_FLOAT);
        $kerri->viti = filter_var($request->input('year'),FILTER_SANITIZE_NUMBER_INT);
        $kerri->perdoruesi_id = Auth::guard('perdoruesit')->user()->id;   
       $kerri->pershkrimi = filter_var($request->input('description'),FILTER_SANITIZE_STRING);
        if(Auth::guard('admins')->check()){
            $kerri->admin_id = Auth::guard('admins')->user()->id;
        }
   

        if($specs->val > 0){
            $kerri->specs = json_encode($specs->items);
        }
        $kerri->save();
        $kerri->slug = Str::slug($request->input('name')) ."-".$kerri->id;
        $kerri->save();
        return redirect()->back()->with('success','Post was uploaded successfully!');
    }
  
}

public function changecurrs(Request $req){
    
    if(Auth::guard('perdoruesit')->user()->role == 'admin'){
       $curr = currency::first();
       $curr->currency = filter_var(mb_substr($req->input('curr'),0,1),FILTER_SANITIZE_STRING);
    $curr->val = filter_var(substr($req->input('curr'),-3),FILTER_SANITIZE_STRING);
       $curr->save();
       return redirect()->back()->with('success','Currency was changed successfully!');}
}
    public function up(){
        return view('up');
    }
        public function del()
    {
        $cart = Session::get('cart');
        $cart->del();
        Session::put('cart');
    }
}
?>