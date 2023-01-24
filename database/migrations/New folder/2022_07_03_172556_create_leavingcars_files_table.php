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
        Schema::create('leavingcars_files', function (Blueprint $table) {
            $table->id();
            $table->string('serialNo', 50); 
            $table->date('exitDate'); 
            $table->text('leaving_file')->nullable();   
            $table->text('insurance_file')->nullable(); 
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
        Schema::dropIfExists('leavingcars_files');
    }
};
