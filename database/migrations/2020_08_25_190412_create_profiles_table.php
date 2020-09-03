<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('real_address');
            $table->string('zip');
            $table->integer('real_state_id')->nullable()->unsigned();
            $table->integer('intern_address_id')->nullable()->unsigned();
            $table->string('phone');
            $table->integer('email_id')->unsigned()->nullable();
            $table->string('ssn')->nullable();
            $table->date('dob')->nullable();
            $table->integer('credit_score')->nullable();
            $table->integer('created_by')->unsigned();
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
        Schema::dropIfExists('profiles');
    }
}
