<?php

namespace App\Entity;

use App\Helpers\SystemHelper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
/**
* @property $name
* @property $email
* @property $email_verified_at
* @property $password
* @property $remember_token
* @property $key
*/
class User extends Authenticatable
{
    protected $table = 'users';
    protected $guarded = [];

    use HasApiTokens, HasFactory, Notifiable;

    public static function createObj($data)
    {
        $obj = self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'key' => SystemHelper::getRandomNumbersAndLetters(20),
            'password' => Hash::make($data['password'])
        ]);

        return $obj;
    }
}
