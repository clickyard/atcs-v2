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
        Schema::create('execlsheet', function (Blueprint $table) {
            $table->id();
            $table->string('carnetNo',200)->nullable(); 
            $table->date('carnetDate')->nullable(); 
            $table->string('name',200)->nullable(); 
            $table->string( 'nationalityNo',200)->nullable(); 
            $table->string('carType',200)->nullable(); 
            $table->string('chassisNo',200)->nullable(); 
            $table->date('entrydate')->nullable(); 
            $table->string('tel1',200)->nullable(); 
            $table->string('tel2',200)->nullable(); 
            $table->string('entryType',200)->nullable(); 
            $table->string('increse1',200)->nullable(); 
            $table->string('increse2',200)->nullable(); 
            $table->string('leavingIncrese',200)->nullable(); 
            $table->date('leavingDate')->nullable(); 
            $table->bigInteger('status')->nullable(); 
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
        Schema::dropIfExists('execlsheet');
    }
};
