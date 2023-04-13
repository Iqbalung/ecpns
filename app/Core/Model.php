<?php

namespace App\Core;

use App\Utils\MakeSlugTrait;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    use MakeSlugTrait;
}
