<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carModels extends Model
{
    use HasFactory;
    protected $table = 'car_models';

    public function cars(){
        return $this->hasMany(Upload::class);
    }
    
    public function related(){
        return $this->hasMany(Upload::class)->orderBy('count','desc')->take(4);
    }

}
?>