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
        Schema::create('car_marks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 400);            
            $table->bigInteger( 'veh_id' )->unsigned();
            $table->foreign('veh_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->string('created_by', 200);
            $table->string('updated_by',200)->nullable();
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
        Schema::dropIfExists('car_marks');
    }
};
