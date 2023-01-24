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
        Schema::create('intarnal_files', function (Blueprint $table) {
            $table->id();
            $table->string('serialNo', 50); 
            $table->date('date'); 
            $table->string('expiryDuration'); 
            $table->date('exitDate'); 
            $table->string('file_name');   
            $table->text('file_path')->nullable(); 
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
        Schema::dropIfExists('intarnal_files');
    }
};
