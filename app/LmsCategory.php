<?php

namespace App;

use App\Core\Model;

class LmsCategory extends Model
{
    protected $table = 'lmscategories';

    public static function getRecordWithSlug($slug)
    {
        return LmsCategory::where('slug', '=', $slug)->first();
    }

    public function contents()
    {
        return $this->hasMany('App\LmsContent', 'category_id');
    }
}
