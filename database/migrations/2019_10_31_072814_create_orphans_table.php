<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrphansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orphans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
            $table->string('gender'); 
            $table->date('date');
            $table->string('mother_name');
            $table->string('mother_job');
            $table->string('brother_count'); 
            $table->string('girl');
            $table->string('boy');
            $table->string('helth_state');
            $table->date('father_date'); 
            $table->string('state');
            $table->string('city');
            $table->string('unit'); 
            $table->integer('home_no');
            $table->string('active')->default('0');
            $table->string('school');
            $table->string('schoolLevel');
            $table->string('images')->nullable();
            $table->text('cirtificate')->nullable();
            $table->string('family');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on ('users')->onUpdate('cascade')->onDelete('cascade');
            

            

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
        Schema::dropIfExists('orphans');
    }
}
