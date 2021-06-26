<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    public $timestamps = true;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_produk',
        'foto',
        'stocks',
        'deskripsi',
        'harga_products'
    ];

    protected $hidden = [
        'remember_token'
    ];

    public function user()
    {
        return $this->belongsTo("App\User", 'fk_user')->withTrashed();
    }
}
