<?php

namespace App;

use App\Core\Model;

class Notification extends Model
{
    protected $table= "notifications";

    public static function getRecordWithSlug($slug)
    {
        return Notification::where('slug', '=', $slug)->first();
    }
}
