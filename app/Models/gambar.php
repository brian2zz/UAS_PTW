<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar extends Model
{
    protected $table = 'produk';
    protected $fillable = ['id_produk','nama','file','keterangan','ukuran','kategori','harga','stok'];
}
