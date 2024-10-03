<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'cover', 'judul', 'id_kategori', 'penulis', 'jml_hlmn', 'penerbit', 'tgl_terbit', ];
    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/buku/' . $this->cover))) {
            return unlink(public_path('images/buku/' . $this->cover));
        }
    }
}
