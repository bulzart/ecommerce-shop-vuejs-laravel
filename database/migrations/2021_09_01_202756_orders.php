<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders',function(Blueprint $table){
            $table->id();
            $table->decimal('total',8,2)->index();
            $table->bigInteger('perdoruesi_id')->nullable();
            $table->integer('sasia')->index();
            $table->timestamps();
            $table->string('emri');
            $table->string('tel');
            $table->string('shteti')->nullable();
            $table->string('adresa')->nullable();
            $table->json('items');
            $table->string('mesazh')->nullable();
            $table->tinyInteger('perfunduar')->default('0');
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
