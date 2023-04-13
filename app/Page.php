<?php

namespace App;

use App\Core\Model;

class Page extends Model
{
    public static function getRecordWithSlug($slug)
    {
        return Page::where('slug', '=', $slug)->first();
    }
}
