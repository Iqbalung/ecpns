<?php

namespace App\Utils;

use Illuminate\Support\Str;

trait MakeSlugTrait
{
    /**
     * Generate a slug from a given title.
     *
     * @param  string  $title  The title to generate slug from.
     * @param  bool  $hash  Whether to append a hash to the slug or not.
     * @return string  The generated slug.
     */
    public static function makeSlug($title, $hash = false)
    {
        $slug = Str::slug($title);

        if (!$slug || $hash) {
            $slug .= ($hash ? '-' : '') . getHashCode();
        }

        $count = static::where('slug', 'LIKE', "{$slug}%")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}
