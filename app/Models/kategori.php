<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $fillable = ['id', 'nama_kategori'];
    use HasFactory;

    public function buku()
    {
        return $this->hasMany(buku::class);
    }
}
