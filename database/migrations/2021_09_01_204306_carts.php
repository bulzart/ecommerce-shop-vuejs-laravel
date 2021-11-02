<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('carts',function(Blueprint $table){
        $table->id();
        $table->bigInteger('perdoruesi_id');
        $table->timestamps();
        $table->tinyInteger('sasia');
        $table->json('items');
        $table->decimal('total',8,2);
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
