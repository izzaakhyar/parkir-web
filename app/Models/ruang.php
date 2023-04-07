<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
    use HasFactory;

    protected $table = 'ruangan';
    protected $fillable = ['ruang, no_kendaraan'];

    public function parkir() {
        return $this->hasOne('parkir');
    }
}
