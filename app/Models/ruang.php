<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
    

    protected $table = 'ruangan';
    protected $fillable = ['no_kendaraan', 'ruang'];
    protected $primaryKey = 'id';

    public function parkir() {
        return $this->belongsTo('parkir');
    }
}
