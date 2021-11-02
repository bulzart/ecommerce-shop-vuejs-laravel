<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    public function perdoruesi(){
        return $this->belongsTo(Perdoruesi::class);
    }

    public function model(){
        return $this->belongsTo(carModels::class,'car_models_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
?>