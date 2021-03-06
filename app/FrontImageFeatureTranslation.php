<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontImageFeatureTranslation extends Model
{
    protected $fillable = ['front_image_feature_id', 'title', 'description', 'language_id'];


    public function language()
    {
        return $this->belongsTo(LanguageSetting::class, 'language_id');
    }
}
