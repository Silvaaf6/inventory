<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hobby extends Model
{
    protected $fillable = ['id', 'nama_hobby'];

    public function profile()
    {
        return $this->hasMany(profile::class, 'id_hobby');
    }
    use HasFactory;
}
