<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseStudiesAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_studies_attachments', function (Blueprint $table) {
            $table->id();
            $table->string('file_name')->unique();
            $table->string('file_description')->nullable();
            $table->string('file_url')->nullable();
            $table->unsignedBigInteger('case_study_id')->nullable();
            $table->foreign('case_study_id')->references('id')->on('case_studies')->onDelete('cascade');
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
        Schema::dropIfExists('case_studies_attachments');
    }
}
