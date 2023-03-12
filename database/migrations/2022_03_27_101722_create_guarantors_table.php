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
        Schema::create('guarantors', function (Blueprint $table) {
            $table->id();
            
            $table->string('gname', 400); 
            $table->bigInteger( 'gcountry_id' )->unsigned();
            $table->foreign('gcountry_id')->references('id')->on('countries');
            $table->bigInteger( 'gstate_id' )->unsigned()->nullable();
            $table->foreign('gstate_id')->references('id')->on('states');
            $table->string('gcity', 900); 
            $table->string('ghouseNo', 100)->nullable();
            $table->string('gstreet', 100)->nullable();
            $table->string('gwork_address', 300)->nullable();
            $table->string('gtel', 100); 
            $table->string('gtel2', 100)->nullable(); 
            $table->string('gwhatsup', 100)->nullable(); 
            $table->string('created_by', 400);
            $table->string('updated_by',400)->nullable();            
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
        Schema::dropIfExists('guarantors');
    }
};
