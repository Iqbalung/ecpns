<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    protected $table = 'user_package';

    public $timestamps = false;

    public static function purchaseExamSeries(UserPackage $param)
    {
        if (!static::where(['user_id' => $param->user_id, 'package_id' => $param->package_id])->first()) {
            return $param->save();
        }

        return true;
    }

    public static function isItemPurchased($package_id, $user_id)
    {
        $exam = static::where(['package_id' => $package_id, 'user_id' => $user_id])->first();

        if (!$exam) {
            return false;
        }

        return true;
    }
}
