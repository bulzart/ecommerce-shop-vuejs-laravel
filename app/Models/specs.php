<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specs extends Model
{
    use HasFactory;
    public $items;
    public $val;
    public function __construct($old = null)
    {
        if($old != null){
            $this->items = $old->items;
          $this->val = $old->val;
        }
        else{
            $this->items = [];
            $this->val = 0;
           
        }
    }
    public function addspec($vlera){
       $this->items[$this->val] = $vlera;
  
       $this->val++;
    }
}
