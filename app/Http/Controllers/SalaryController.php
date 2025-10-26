<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee; // <-- PENTING: Panggil Model Employee
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Tampilkan semua data gaji.
     */



    public function index()
    {
        // Ambil data gaji, 'with' untuk ambil data relasi employee
        $salaries = Salary::with('employee')->latest()->get();
        
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Tampilkan form untuk membuat data gaji baru.
     */
    public function create()
    {
        // Ambil semua karyawan untuk dropdown
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    /**
     * Simpan data gaji baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data berdasarkan migration [cite: 96-101]
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10', // [cite: 97]
            'tunjangan' => 'nullable|numeric|min:0', // [cite: 99]
            'potongan' => 'nullable|numeric|min:0', // [cite: 100]
        ]);

        $gaji_pokok = Employee::find($request->karyawan_id)->positions->gaji_pokok;
        $total_gaji = $gaji_pokok - $request->potongan + $request->tunjangan;


        Salary::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'gaji_pokok' => $gaji_pokok,
            'total_gaji' => $total_gaji
        ]);

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil ditambahkan.');
    }

    /**
     * Tampilkan form untuk mengedit data gaji.
     */
    public function edit(Salary $salary)
    {
        // Ambil semua karyawan untuk dropdown
        $employees = Employee::all();
        
        // Kirim data gaji yg mau diedit & daftar karyawan ke view
        return view('salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Update data gaji di database.
     */
    public function update(Request $request, Salary $salary)
    {
        // Validasi data berdasarkan migration [cite: 96-101]
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10', // [cite: 97]
            'tunjangan' => 'nullable|numeric|min:0', // [cite: 99]
            'potongan' => 'nullable|numeric|min:0', // [cite: 100]
        ]);

        $salary->update($request->all());

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil diperbarui.');
    }

    /**
     * Hapus data gaji dari database.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();

        return redirect()->route('salaries.index')
                         ->with('success', 'Data gaji berhasil dihapus.');
    }
}