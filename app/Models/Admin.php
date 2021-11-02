<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class Admin extends Authenticatable
{

    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public $items,$price,$qty;
    
    public function __construct($old)
    {
     if($old == null){
    $this->items = [];
    $this->price = 0;
    $this->qty = 0;
     }
     else{
         $this->items = $old->items;
         $this->price = $old->price;
         $this->qty = $old->qty;
     }
    }

    public function addupload($id){
$produkt = Upload::find($id);
     if(isset($this->items[$id])){
       $this->items[$id]['pqty']++;
     }
     else{
         $this->items[$id]['pqty'] = 1;
         $this->items[$id]['emri'] = $produkt->emri;
         $this->items[$id]['cmimi'] = $produkt->cmimi;
         $this->items[$id]['url'] = $produkt->path;
         $this->items[$id]['modeli'] = $produkt->model->modeli;
     }
     
    
     $this->price += $produkt->cmimi;
     $this->qty++;
    }
    public function deleteall(){
        $this->items = null;
        $this->price = 0;
        $this->qty = 0;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function images(){
        return $this->hasMany(Image::class);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
?>