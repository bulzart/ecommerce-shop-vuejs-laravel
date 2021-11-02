<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    public $url,$name;

    public function __construct($old = null)
    {
        if($old != null){
            $this->url = $old->url;
           
        }
        else{
            $this->url = [];
        }
    }

    public function addimg($id,$url,$width,$height){
       if(!isset($this->url[$id])){
          $this->url[$id]['url'] = $url;
        $this->url[$id]['width'] = $width;
    $this->url[$id]['height'] = $height;}
          else{
              $this->url[$id]->url = $url;
          }
    }
  

    public function thisstring($id){
        $st = $this->url[$id]->url;
       $strp = str_replace('images','/',$st);
       return $strp;
    }

    
}
?>