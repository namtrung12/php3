<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tin';

    protected $fillable = [
        'idLT',
        'tieuDe',
        'tomTat',
        'noiDung',
        'ngayDang',
        'xem',
        'urlHinh',
    ];

    protected $casts = [
        'ngayDang' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function loaitin()
    {
        return $this->belongsTo(LoaiTin::class, 'idLT');
    }
}
