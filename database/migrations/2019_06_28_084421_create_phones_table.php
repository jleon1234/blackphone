<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_recibo');
            $table->string('marca');
            $table->string('modelo');
            $table->string('imei');
            $table->string('daño');
            $table->string('codigo');
            $table->string('total');
            $table->string('abono');
            $table->string('restante');
            $table->string('estado')->default('en revision');
            $table->unsignedBigInteger('client_id'); 
            $table->foreign('client_id')->references('id')->on('clients');
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
        Schema::dropIfExists('phones');
    }
}
