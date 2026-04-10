<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Tin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tin';

    protected $primaryKey = 'id';

    public $timestamps = true;

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

    protected static function booted(): void
    {
        static::created(function (Tin $tin): void {
            Log::info('Da them tin', ['id' => $tin->id, 'tieuDe' => $tin->tieuDe]);
        });

        static::updated(function (Tin $tin): void {
            Log::info('Da cap nhat tin', ['id' => $tin->id, 'tieuDe' => $tin->tieuDe]);
        });

        static::deleted(function (Tin $tin): void {
            Log::info('Da xoa mem tin', ['id' => $tin->id, 'tieuDe' => $tin->tieuDe]);
        });

        static::restored(function (Tin $tin): void {
            Log::info('Da khoi phuc tin', ['id' => $tin->id, 'tieuDe' => $tin->tieuDe]);
        });

        static::forceDeleted(function (Tin $tin): void {
            Log::info('Da xoa vinh vien tin', ['id' => $tin->id, 'tieuDe' => $tin->tieuDe]);
        });
    }
}
