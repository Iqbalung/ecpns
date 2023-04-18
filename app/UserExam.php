<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    protected $table = 'user_exams';

    public $timestamps = false;

    public static function purchaseExamSeries(UserExam $param)
    {
        if (!static::where(['user_id' => $param->user_id, 'exam_series_id' => $param->exam_series_id])->first()) {
            return $param->save();
        }

        return true;
    }

    public static function isItemPurchased($exam_series_id, $user_id)
    {
        $exam = static::where(['exam_series_id' => $exam_series_id, 'user_id' => $user_id])->first();

        if (!$exam) {
            return false;
        }

        return true;
    }
}
