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
        Schema::create('custrefrances', function (Blueprint $table) {
            $table->id();
            $table->string('cname', 400); 
            $table->bigInteger( 'ccountry_id' )->unsigned();
            $table->foreign('ccountry_id')->references('id')->on('countries');
            $table->bigInteger( 'cstate_id' )->unsigned();
            $table->foreign('cstate_id')->references('id')->on('states');
            $table->string('ccity', 100); 
            $table->string('cblock', 100)->nullable(); 
            $table->string('chouseNo', 100)->nullable();  
            $table->string('cstreet', 200)->nullable(); 
            $table->string('cwork_address', 200)->nullable(); 
            $table->bigInteger('ctel')->nullable(); 
            $table->string('created_by', 100);
            $table->string('updated_by',100)->nullable();            
            $table->bigInteger( 'customer_id' )->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('custrefrances');
    }
};
