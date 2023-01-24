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
        Schema::create('increases', function (Blueprint $table) {
            $table->id();
            $table->string('serialNo', 50); 
            $table->bigInteger('voucher'); 
            $table->date('entryDate'); 
            $table->date('exitDate');             
            $table->string('signature',200); 
            $table->bigInteger( 'emp_id' )->unsigned();
            $table->foreign('emp_id')->references('id')->on('emportcars')->onDelete('cascade');
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
        Schema::dropIfExists('increase_files');
    }
};
