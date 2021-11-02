<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Uploads extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('uploads',function(Blueprint $table){
                $table->id();
                $table->string('emri');
               $table->tinyInteger('carousel')->default('0');
                $table->integer('car_models_id')->index();
                $table->timestamps();
                $table->string('path');
                $table->string('ngjyra')->nullable();
                $table->decimal('cmimi',8,2);
                $table->string('viti');
                $table->string('pershkrimi')->nullable();
                $table->bigInteger('perdoruesi_id');
                $table->string('slug')->nullable();
                $table->json('url');
                $table->tinyInteger('cnt')->nullable();
                $table->tinyInteger('count')->default('0');
                $table->string('disk');
                $table->string('ram')->nullable();
                $table->decimal('size',3,1)->nullable();
                $table->string('battery')->nullable();
                $table->string('cpu')->nullable();
                $table->string('gpu')->nullable();
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
