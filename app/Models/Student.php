<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "students";
    protected $primaryKey = "id";
    protected $fillable = [
        'username',
        'auth_key',
        'ip_address',
        'remember_token',
    ];

    protected $hidden = [
        'auth_key',
    ];

}
