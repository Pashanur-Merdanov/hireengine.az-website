<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontImageFeatureTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_image_feature_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('front_image_feature_id');
            $table->foreign('front_image_feature_id')->references('id')->on('front_image_features')->onDelete('cascade');
            $table->text('title');
            $table->text('description');
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
        Schema::dropIfExists('front_image_feature_translations');
    }
}
