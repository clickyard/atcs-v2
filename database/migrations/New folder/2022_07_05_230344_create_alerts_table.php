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
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('serialNo', 50); 
            $table->string('title', 100); 
            $table->text('desc')->nullable(); 
            $table->text('attachment')->nullable(); 
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
        Schema::dropIfExists('alerts');
    }
};
