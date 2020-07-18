<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponserformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('sponserforms', function (Blueprint $table) {
            $table->increments('id');
            $table->double('cache');
            $table->string('kafal_type');
            $table->string('payment_type');
            $table->integer('orphan_id')->unsigned();
            $table->foreign('orphan_id')->references('id')->on ('orphans')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('sponserforms');
    }
}
