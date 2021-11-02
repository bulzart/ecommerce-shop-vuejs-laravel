<?php

namespace App\Models;
use App\Models\Upload;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Decimal;

class CCart extends Model
{
    use HasFactory;
    public $sasia,$items;
    public float $total;

    public function __construct($old = null)
    {
        if($old == null){
            $this->items = [];
            $this->sasia = 0;
            $this->total = 0.0;
         
        }
        else{
            $this->items = $old->items;
            $this->sasia = $old->sasia; 
            $this->total = $old->total;
        }
    }

    public function additems($items){
       if($this->items == null){
           $this['items'] = $items->items;
       }
       else{
        $this->items = $items->items;
       }
    }
    public function addtocart($id){
        $product = Upload::where('id',$id)->first();
        if(isset($this->items[$id])){
            if(Auth::guard('perdoruesit')->check()){
            $this->items[$id]->sasia++;}
            else{
                $this->items[$id]['sasia']++;
            }
        }
        else{
            $this->items[$id]['id'] = $id;
            $this->items[$id]['sasia']= 1;
            $this->items[$id]['url'] = $product->path;
            $this->items[$id]['cmimi'] = $product->cmimi;
            $this->items[$id]['emri'] = $product->emri;
            $this->items[$id]['ngjyra'] = $product->ngjyra;
            $this->items[$id]['slug'] = $product->slug;
            $this->items[$id]['perdoruesi'] = $product->perdoruesi_id;
          
        }
        $this->sasia++;
        $this->total += $product->cmimi;
        
    }
 public function totaldel(){
     $this->total = 0.00;
 }


 public function deleteprod($id){
    if(isset($this->items[$id])){
        if(Auth::guard('perdoruesit')->check()){
            $this->total -= $this->items[$id]->sasia * $this->items[$id]->cmimi;
            $this->sasia -= $this->items[$id]->sasia;
            unset($this->items[$id]);}
else{
    $this->total -= $this->items[$id]['sasia'] * $this->items[$id]['cmimi'];
    $this->sasia -= $this->items[$id]['sasia'];
    unset($this->items[$id]);}

}
    
    else{
        return "Produkti nuk ekziston";
        $this->cmimi = 0;
    }
}
    public function minus($id){
        if(Auth::guard('perdoruesit')->check()){
        if($this->items[$id]->sasia == 1){
            $this->deleteprod($id);
        
    }
        else{
            $this->items[$id]->sasia--;
            $this->sasia--;
            $this->total -= (float) $this->items[$id]->cmimi;
        } }
        else {
            if($this->items[$id]['sasia'] == 1){
                $this->deleteprod($id);
            
        }
            else{
                $this->items[$id]['sasia']--;
                $this->sasia--;
                $this->total -= (float) $this->items[$id]['cmimi'];
            } 
        }
    
    }
    
  

    public function del(){
        $this->total = 0;
        $this->sasia = null;
        $this->items = [];
    }
}
?>