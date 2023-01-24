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
        Schema::create('emportcars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger( 'car_id' )->unsigned();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            $table->bigInteger( 'ship_id' )->unsigned();
            $table->foreign('ship_id')->references('id')->on('ships');     
            $table->bigInteger( 'port_id' )->unsigned();
            $table->foreign('port_id')->references('id')->on('shippingports');    
            $table->bigInteger( 'portAccess_id' )->unsigned();
            $table->foreign('portAccess_id')->references('id')->on('shippingports');   
            $table->string('carnetNo',100); 
            $table->string('destination', 100); 
            $table->string('shippingAgent', 100)->nullable();
            $table->string('deliveryPerNo',100)->nullable();
            $table->date('issueDate')->nullable();
            $table->date('expiryDate')->nullable();
            $table->date('entryDate')->nullable();
            $table->date('exitDate')->nullable();          
            $table->boolean('allow_increase')->nullable();
            $table->boolean('increase')->nullable();
            $table->Integer('duration')->nullable();
            $table->integer('status')->nullable();
            $table->string('status_value', 50)->nullable();  
            $table->string('comment', 500)->nullable();  
            $table->boolean('alerts')->nullable();
            $table->boolean('takhlees')->nullable();
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
        Schema::dropIfExists('emportcars');
    }
};
