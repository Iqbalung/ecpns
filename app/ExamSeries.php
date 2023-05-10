<?php

namespace App;

use App\Core\Model;
use DB;

class ExamSeries extends Model
{
    protected $table = 'examseries';

    public static function getRecordWithSlug($slug)
    {
        return ExamSeries::where('slug', '=', $slug)->first();
    }

    /**
     * This method lists all the items available in selected series
     * @return [type] [description]
     */
    public function itemsList()
    {
        return DB::table('examseries_data')
            ->join('quizzes', 'quizzes.id', '=', 'quiz_id')
            ->select('quizzes.*')
            ->where('examseries_id', '=', $this->id)->get();
    }

    public function packageList()
    {
        return DB::table('quizzes')
            ->select('quizzes.*', 'packages.name', 'packages.level')
            ->leftJoin('packages', 'packages.id', '=', 'package_id')
            ->get();
    }
}