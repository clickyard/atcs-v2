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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 400); 
            $table->string('nationality',20)->nullable(); 
            $table->string('nationalityNo',20);  
            $table->string('passport', 100); 
            $table->date('passportDate')->nullable(); 
            $table->string('licensetype', 100)->nullable(); 
            $table->bigInteger('licenseNo')->nullable(); 
            $table->bigInteger('residenceNo'); 
            $table->date('residenceDate')->nullable(); 
            $table->bigInteger( 'country_id' )->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->bigInteger( 'state_id' )->unsigned();
            $table->foreign('state_id')->references('id')->on('states');
            $table->string('city', 300);
            $table->string('block', 100)->nullable();
            $table->string('houseNo', 100)->nullable();
            $table->string('street', 100)->nullable(); 
            $table->string('work_address', 200)->nullable();
            $table->string('tel', 100); 
            $table->string('tel2', 100)->nullable();
            $table->string('email', 400)->nullable();
            $table->string('whatsup', 100)->nullable(); 
            $table->string('processType', 10);     
            $table->string('created_by', 100);
            $table->string('updated_by',100)->nullable();
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
        Schema::dropIfExists('customers');
    }
};
