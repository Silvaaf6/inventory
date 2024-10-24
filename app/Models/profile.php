<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = ['id', 'id_user', 'cover', 'username', 'tempat_lahir', 'tgl_lahir', 'agama', 'alamat', 'jenis_kelamin', 'no_telp', 'id_hobby'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(user::class, 'id_user');
    }

    public function hobby()
    {
        return $this->belongsTo(hobby::class, 'id_hobby');
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/profile/' . $this->cover))) {
            return unlink(public_path('images/profile/' . $this->cover));
        }
    }
}
