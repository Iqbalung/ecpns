<?php

namespace App;

use App\Core\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';


    public static function getRecordWithSlug($slug)
    {
        return Feedback::where('slug', '=', $slug)->first();
    }
}
