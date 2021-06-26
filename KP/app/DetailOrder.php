<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class DetailOrder extends Model
{
    protected $fillable = ['fk_order', 'fk_produk', 'jumlah_pesanan', 'harga_barang', 'sub_total'];
    use Notifiable;
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo("App\Product", 'fk_produk')->withTrashed();
    }
}
