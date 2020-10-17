<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontCmsHeaderTranslation extends Model
{
    protected $fillable = ['front_cms_header_id', 'title', 'description', 'call_to_action_title', 'contact_text',
        'meta_details', 'language_id'];

    protected $casts = [
        'meta_details' => 'array'
    ];
    
    public function language()
    {
        return $this->belongsTo(LanguageSetting::class, 'language_id');
    }

}
