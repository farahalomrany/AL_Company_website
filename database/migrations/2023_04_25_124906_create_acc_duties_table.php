<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccDutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_duties', function (Blueprint $table) {
            $table->id();
            $table->longText('duty_description');
          
            $table->unsignedBigInteger('accounts_experiences_id')->nullable();
            $table->foreign('accounts_experiences_id')->references('id')->on('acc_experiences')->onDelete('cascade');
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
        Schema::dropIfExists('acc_duties');
    }
}
