<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarangs extends Model
{
    use HasFactory;

    protected $table = 'data_barangs'; // Name of the table
    protected $primaryKey = 'id_barang'; // Set primary key
    public $incrementing = false; // Change based on your primary key type
    protected $keyType = 'string'; // Change if id_barang is not a string
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'harga_barang'
    ];
}
