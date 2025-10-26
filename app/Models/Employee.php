<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{

    use HasFactory;

    public function department(): BelongsTo
    {

        return $this->belongsTo(Department::class, "departemen_id");
    }


    public function positions(): BelongsTo
    {
        return $this->belongsTo(Position::class, "jabatan_id");
    }

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
        'departemen_id',
        'jabatan_id'
        ];
}
