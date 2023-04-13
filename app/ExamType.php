<?php

namespace App;

use App\Core\Model;

class ExamType extends Model
{
    protected $table="examtypes";
    protected $fillable = ['title', 'description', 'status'];
}
