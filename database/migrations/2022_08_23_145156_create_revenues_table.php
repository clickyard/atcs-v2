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
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            $table->string('carnetNo',100); 
            $table->bigInteger( 'emp_id' )->unsigned();
            $table->foreign('emp_id')->references('id')->on('emportcars')->onDelete('cascade');
            $table->decimal('carnet',10,2); 
            $table->decimal('portsudan',10,2)->nullable();
            $table->decimal('increase',10,2)->nullable();
            $table->decimal('takhlees',10,2)->nullable();
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
        Schema::dropIfExists('revenues');
    }
};
