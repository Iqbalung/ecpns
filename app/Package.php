<?php

namespace App;

use App\Core\Model;
use DB;


class Package extends Model
{
    public static function getRecordWithSlug($slug)
    {
        return Package::where('slug', '=', $slug)->first();
    }

    public function itemsList()
    {
        return DB::table('quizzes', 'quizzes.id', '=', 'quiz_id')
         ->select('quizzes.*')
            ->get();
    }
}
