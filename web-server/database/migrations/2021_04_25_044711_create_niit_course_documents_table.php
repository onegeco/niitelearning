<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiitCourseDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niit_course_documents', function (Blueprint $table) {
            $table->id();
            $table->string('document_type');
            $table->string('document_course_name');
            $table->string('sub_course')->nullable();
            $table->string('subject_title');
            $table->string('document_file');
            $table->string('doument_url');
            $table->string('slug');
            $table->longText('course_overview');
            $table->string('officiating_lecturer');
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
        Schema::dropIfExists('niit_course_documents');
    }
}
