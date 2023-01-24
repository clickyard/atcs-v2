<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardetails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('year'); 
            $table->bigInteger('weight');      
            $table->bigInteger('cylindersNo'); 
            $table->string('hoursPower', 10); 
            $table->string('type', 16);
            $table->integer('seats'); 
            $table->integer('radio'); 
            $table->integer('numTires'); 
            $table->string('airCondition', 100); 
            $table->longtext('others')->nullable(); 
            $table->bigInteger( 'car_id' )->unsigned();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');   
            $table->string('created_by', 400);
            $table->string('updated_by',400)->nullable();
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
        Schema::dropIfExists('cardetails');
    }
};
