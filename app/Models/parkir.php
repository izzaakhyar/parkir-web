<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parkir extends Model
{
    protected $table = 'parkir';
    protected $fillable = ['platNomor'];
    protected $primaryKey = 'id';

    public function ruang() {
        return $this->hasOne('ruang');
    }
}