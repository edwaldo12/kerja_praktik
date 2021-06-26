<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use SoftDeletes;
    public $timestamps = true;

    protected $fillable = [
        'judul',
        'tanggal',
        'foto',
        'deskripsi'
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function user()
    {
        return $this->belongsTo("App\User", 'fk_user')->withTrashed();
    }
}
