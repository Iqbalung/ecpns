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
        ->select('quizzes.*','packages.name','packages.level')
          ->leftJoin('packages', 'packages.id', '=', 'package_id')
            ->get();
    }

    public static function isPurchasedExamSeries($package_id,$user_id)
    {
        return UserPackage::where(['user_id' => $user_id, 'package_id' => $package_id])->first() !== null;
    }
}
