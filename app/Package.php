<?php

namespace App;

use App\Core\Model;

class Package extends Model
{
    public static function getRecordWithSlug($slug)
    {
        return Package::where('slug', '=', $slug)->first();
    }
}
