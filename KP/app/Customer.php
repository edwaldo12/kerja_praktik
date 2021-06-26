<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use Notifiable, SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'username',
        'password',
        'jenis_kelamin',
        'alamat',
        'tanggal_lahir',
        'email',
        'status',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
