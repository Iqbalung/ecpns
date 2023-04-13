<?php

namespace App;

use App\Core\Model;

class ResumeTemplate extends Model
{
    protected $table = "resumetemplates";


    public static function getRecordWithSlug($slug)
    {
        return ResumeTemplate::where('slug', '=', $slug)->first();
    }
}
