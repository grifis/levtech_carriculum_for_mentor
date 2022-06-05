<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('lat')->nullable();
            $table->integer('lng')->nullable();
            $table->integer('count')->nullable();
            
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('kasa');
    }
}
