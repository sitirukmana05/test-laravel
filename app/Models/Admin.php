<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Field yang bisa diisi secara massal
    protected $fillable = ['username', 'no_telepon', 'nama_admin', 'password'];
}
