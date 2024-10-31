<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = ['id', 'id_user', 'cover', 'username', 'tempat_lahir', 'tgl_lahir', 'agama', 'alamat', 'jenis_kelamin', 'no_telp'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hobi()
    {
        return $this->belongsToMany(Hobi::class, 'hobi_profile', 'id_profile', 'id_hobi');
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/profile' . $this->cover))) {
            return unlink(public_path('images/profile' . $this->cover));
        }
    }
}
