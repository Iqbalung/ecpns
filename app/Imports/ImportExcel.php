<?php

namespace App\Imports;

use App\QuestionBank;
use Maatwebsite\Excel\Concerns\ToModel;
use Ramsey\Uuid\Uuid;

class ImportExcel implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!empty($row[0])){
            return new QuestionBank([
                //
                'subject_id' => @$row[0],
                'topic_id' => @$row[1],
                'question_type' => @$row[2],
                'question' => @$row[3],
                'marks' => @$row[4],
                'time_to_spend' => @$row[5],
                'difficulty_level'=> @$row[6],
                'hint' => @$row[7],
                'explanation'=> @$row[8],
                'total_answers'=> @$row[9],
                'total_correct_answers' => @$row[10],
                'correct_answer' => @$row[11],
                'answer1' => @$row[12],
                'answer2' => @$row[13],
                'answer3' => @$row[14],
                'answer4' => @$row[15],
                'slug' => Uuid::uuid4()

            ]);
            
        }
       
    }
}
