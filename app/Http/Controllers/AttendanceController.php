<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee; // <-- PENTING: Panggil Model Employee
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
    /**
     * Tampilkan semua data absensi.
     */
    public function index()
    {
        // Ambil data absensi, 'with' digunakan agar data relasi employee-nya ikut terambil
        // Ini akan sangat berguna di view untuk menampilkan nama karyawan
        $attendances = Attendance::with('employee')->latest()->get();

        return view('attendances.index', compact('attendances'));
    }

    /**
     * Tampilkan form untuk membuat absensi baru.
     */
    public function create()
    {
        // Ambil semua karyawan untuk ditampilkan di dropdown
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index')
                         ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    /**
     * Tampilkan form untuk mengedit data absensi.
     */
    public function edit(Attendance $attendance)
    {
        // Ambil semua karyawan untuk dropdown
        $employees = Employee::all();
        
        // Kirim data absensi yg mau diedit & daftar karyawan ke view
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    /**
     * Update data absensi di database.
     */
    public function update(Request $request, Attendance $attendance)
    {
        // Validasi data berdasarkan migration [cite: 75-79]
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'nullable|date_format:H:i:s',
            'waktu_keluar' => 'nullable|date_format:H:i:s',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha', // [cite: 79]
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendances.index')
                         ->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Hapus data absensi dari database.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendances.index')
                         ->with('success', 'Data absensi berhasil dihapus.');
    }
}