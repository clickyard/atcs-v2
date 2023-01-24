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
        Schema::create('guarefrances', function (Blueprint $table) {
            $table->id();
            $table->string('grname', 400); 
            $table->bigInteger( 'grcountry_id' )->unsigned();
            $table->foreign('grcountry_id')->references('id')->on('countries');
            $table->bigInteger( 'grstate_id' )->unsigned();
            $table->foreign('grstate_id')->references('id')->on('states');
            $table->string('grcity', 100); 
            $table->string('grblock', 100)->nullable(); 
            $table->string('grhouseNo', 40)->nullable(); 
            $table->string('grstreet', 200)->nullable(); 
            $table->string('grwork_address', 200)->nullable(); 
            $table->bigInteger('grtel'); 
            $table->string('created_by', 400);
            $table->string('updated_by',400)->nullable();            
            $table->bigInteger( 'gua_id' )->unsigned();
            $table->foreign('gua_id')->references('id')->on('guarantors')->onDelete('cascade');
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
        Schema::dropIfExists('guarefrances');
    }
};
