<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    public function employee()
{
    return $this->belongsTo(Employee::class, 'karyawan_id');
}

    protected $fillable = [
        'karyawan_id', 
        'bulan', 
        'gaji_pokok', 
        'tunjangan', 
        'potongan', 
        'total_gaji', 
    ];
}