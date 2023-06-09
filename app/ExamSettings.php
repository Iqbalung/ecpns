<?php

namespace App;

use App\Core\Model;

class ExamSettings extends Model
{
    ////////////////////////////
    // Exam upload options //
    ////////////////////////////
    protected $settings = array(
     'categoryImagepath'     	=> "public/uploads/exams/categories/",
     'defaultCategoryImage'     => "default.png",
     'seriesImagepath'          => "public/uploads/exams/series/",
     'seriesThumbImagepath'     => "public/uploads/exams/series/thumb/",
     'defaultCategoryImage'     => "default.png",
     'imageSize'                => 300,
     'examMaxFileSize'          => 10000,
     'topper_percentage'        => 40,
     'maximum_toppers_per_quiz'        => 10,
     );



    /**
     * This method returns the settings related to Library System
     * @param  boolean $key [For specific setting ]
     * @return [json]       [description]
     */
    public function getSettings($key = false)
    {
        if ($key && array_key_exists($key, $settings)) {
            return json_encode($this->settings[$key]);
        }
        return json_encode($this->settings);
    }
}
