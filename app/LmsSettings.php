<?php

namespace App;

use App\Core\Model;

class LmsSettings extends Model
{
    protected $settings = array(
    'categoryImagepath'        => "public/uploads/lms/categories/",
    'contentImagepath'     	=> "public/uploads/lms/content/",
    'seriesImagepath'          => "public/uploads/lms/series/",
    'seriesThumbImagepath'     => "public/uploads/lms/series/thumb/",
    'defaultCategoryImage'     => "default.png",
    'imageSize'                => 300,
    'examMaxFileSize'          => 10000,
    'content_types'            => array(
                                   'file' => 'File',
                                   'video' => 'Video File',
                                   'audio' => 'Audio File',
                                   'video_url' => 'Video URL',
                                   'iframe' => 'Iframe',
                                   'audio_url' => 'Audio URL',
                                   'url' => 'URL'
                                   )
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
