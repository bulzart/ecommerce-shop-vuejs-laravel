<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Perdoruesit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perdoruesit',function(Blueprint $table){
            $table->id();
            $table->string('name')->index();
            $table->string('email')->index();
            $table->string('password');
            $table->timestamps();
            $table->string('tel')->index();
            $table->string('viber')->index();
            $table->integer('online')->default('0');
            $table->string('role')->nullable();
            $table->string('company_name')->nullable();
            
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
