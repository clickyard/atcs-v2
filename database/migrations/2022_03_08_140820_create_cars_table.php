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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();                    
            $table->bigInteger( 'veh_id' )->unsigned();
            $table->foreign('veh_id')->references('id')->on('vehicles');
            $table->bigInteger( 'mark_id' )->unsigned();
            $table->foreign('mark_id')->references('id')->on('car_marks');
            $table->bigInteger( 'place_id' )->unsigned();
            $table->string('year', 100)->nullable();
            $table->foreign('place_id')->references('id')->on('countries'); 
            $table->bigInteger( 'customer_id' )->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');    
            $table->string('plateNo',100); 
            $table->decimal('valueUsd',10,2)->nullable();
            $table->string('machineNo',100)->nullable(); 
            $table->string('chassisNo',100); 
            $table->string('color', 16);
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
        Schema::dropIfExists('cars');
    }
};
