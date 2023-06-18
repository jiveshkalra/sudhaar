<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasFactory, Notifiable,HasApiTokens;
    protected $table = "students";
    protected $primaryKey = "id";
    protected $fillable = [
        'username',
        'auth_key',
        'ip_address',
    ];

    protected $hidden = [
        'auth_key',
    ];

}
