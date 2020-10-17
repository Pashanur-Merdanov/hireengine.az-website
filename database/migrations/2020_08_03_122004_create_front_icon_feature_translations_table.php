<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontIconFeatureTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_icon_feature_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('front_icon_feature_id');
            $table->foreign('front_icon_feature_id')->references('id')->on('front_icon_features')->onDelete('cascade');
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
        Schema::dropIfExists('front_icon_feature_translations');
    }
}
