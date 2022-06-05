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
        Schema::create('kasas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->double('lat',20,17)->nullable();
            $table->double('lng',20,17)->nullable();
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
