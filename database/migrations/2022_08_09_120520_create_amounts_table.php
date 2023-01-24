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
        Schema::create('amounts', function (Blueprint $table) {
            $table->id();
            $table->decimal('carnet',10,2); 
            $table->decimal('portsudan',10,2); 
            $table->decimal('increase',10,2); 
            $table->decimal('letter',10,2); 
            $table->decimal('moanye',10,2); 
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
        Schema::dropIfExists('amounts');
    }
};
