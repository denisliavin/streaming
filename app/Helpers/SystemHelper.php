<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class SystemHelper
{
    public static function isExistFile($path)
    {
        if (File::exists(public_path($path))) {
            return true;
        } else {
            return false;
        }
    }

    public static function getRandomNumbersAndLetters($strength)
    {
        $permitted_chars = '0123456789qweruiopasdhkzxcvbnm';

        return self::getRandomStr($strength, $permitted_chars);
    }

    public static function getRandomNumbers($strength)
    {
        $permitted_chars = '0123456789';

        return self::getRandomStr($strength, $permitted_chars);
    }

    public static function getRandomStr($strength, $permitted_chars)
    {
        $input_length = strlen($permitted_chars);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}
