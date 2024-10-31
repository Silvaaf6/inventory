<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_hobi'];

    public function profile()
    {
        return $this->belongsToMany(Profile::class, 'hobi_profile', 'id_profile', 'id_hobi');
    }
}
