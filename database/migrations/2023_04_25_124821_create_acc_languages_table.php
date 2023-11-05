<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acc_languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('reading_level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->enum('writing_level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->enum('listening_level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->enum('speaking_level', ['beginner', 'intermediate', 'advanced'])->default('beginner');

            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
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
        Schema::dropIfExists('acc_languages');
    }
}
