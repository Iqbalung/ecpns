<?php

namespace App;

use App\Core\Model;

class Instruction extends Model
{
    protected $table="instructions";


    public static function getRecordWithSlug($slug)
    {
        return Instruction::where('slug', '=', $slug)->first();
    }
}
