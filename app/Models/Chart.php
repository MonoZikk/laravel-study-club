<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    //
    protected $table = 'charts';
    protected $primarykey = 'id';
    protected $fillable = ['user_id', 'kode_barang', 'nama_barang', 'qty', 'harga_barang', 'total_harga_barang'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
