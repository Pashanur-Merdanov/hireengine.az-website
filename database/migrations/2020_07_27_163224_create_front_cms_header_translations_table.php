<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontCmsHeaderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_cms_header_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('front_cms_header_id');
            $table->foreign('front_cms_header_id')->references('id')->on('front_cms_headers')->onDelete('cascade');
            $table->text('title');
            $table->text('description');
            $table->text('call_to_action_title');
            $table->mediumText('contact_text');
            $table->text('meta_details');
            $table->unsignedInteger('language_id');
            $table->foreign('language_id')->references('id')->on('language_settings')->onDelete('cascade');
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
        Schema::dropIfExists('front_cms_header_translations');
    }
}
