<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    protected $fillable = ['alamat', 'nomor_telepon_pemesan', 'fk_customer', 'total_harga_dibayar', 'upload_file', 'fk_id'];
    use Notifiable, SoftDeletes;
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo("App\User", 'user_id')->withTrashed();
    }
    public function customer()
    {
        return $this->belongsTo("App\Customer", 'fk_customer')->withTrashed();
    }
    public function detailOrders()
    {
        return $this->hasMany("App\DetailOrder", 'fk_order');
    }

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case '0':
                return 'Menunggu Pembayaran';
            case '1':
                return 'Menunggu Konfirmasi';
            case '2':
                return 'Sedang Di Proses';
            case '3':
                return 'Mengirim Pesanan';
            case '4':
                return 'Sedang Di Kirim';
            case '5':
                return 'Selesai';
            case '6':
                return 'Dibatalkan';
        }
    }
}
