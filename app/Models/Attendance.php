<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = "attendance";

    public function employee()
{
    return $this->belongsTo(Employee::class, 'karyawan_id');
}

    protected $fillable = [
        'karyawan_id', 
        'tanggal', 
        'waktu_masuk', 
        'waktu_keluar', 
        'status_absensi', 
    ];
}