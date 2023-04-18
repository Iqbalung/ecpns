<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class FacebookAccount extends Model
{
    protected $table = 'facebook_account_deletion';

    public $timestamps = false;

    public static function getStatus($confirmation_code)
    {
        return static::where('confirmation_code', '=', $confirmation_code)->first();
    }

    public static function requestDeletion($param)
    {
        $deletion = new static();

        $deletion->name = $param['name'];
        $deletion->email = $param['email'];
        $deletion->payload = $param['payload'];
        $deletion->confirmation_code = static::generateConfirmationCode();

        return $deletion->save();
    }

    public static function generateConfirmationCode()
    {
        $code = Str::uuid()->toString();

        for (;;) {
            if (!static::getStatus($code)) {
                return $code;
            }

            $code = Str::uuid()->toString();
        }
    }
}
