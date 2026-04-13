<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTin extends Model
{
    use HasFactory;

    protected $table = 'loaitin';

    public $timestamps = false;

    protected $fillable = [
        'tenLoai',
        'slug',
    ];

    public function tin()
    {
        return $this->hasMany(Tin::class, 'idLT');
    }
}
