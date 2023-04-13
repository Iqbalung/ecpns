<?php

namespace App;

use App\Core\Model;

class Blog extends Model
{
    public static function getRecordWithSlug($slug)
    {
        return Blog::where('slug', '=', $slug)->first();
    }
}
