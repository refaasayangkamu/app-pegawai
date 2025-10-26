<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Tampilkan semua data department.
     */
    public function index()
    {
        $departments = Department::latest()->get();
        return view('departments.index', compact('departments'));
    }

    /**
     * Tampilkan form untuk membuat department baru.
     */
    public function create()
    {
        
        return view('departments.create');
    }

    /**
     * Simpan department baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data berdasarkan migration
        $request->validate([
            'nama_departemen' => 'required|string|max:100', // [cite: 27]
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')
                         ->with('success', 'Departemen berhasil ditambahkan.');
    }

    /**
     * Tampilkan form untuk mengedit department.
     */
    public function edit(Department $department)
    {
        // Variabel $department sudah otomatis berisi data yg akan diedit
        return view('departments.edit', compact('department'));
    }

    /**
     * Update data department di database.
     */
    public function update(Request $request, Department $department)
    {
        // Validasi data
        $request->validate([
            'nama_departemen' => 'required|string|max:100', // [cite: 27]
        ]);

        $department->update($request->all());

        return redirect()->route('departments.index')
                         ->with('success', 'Departemen berhasil diperbarui.');
    }

    /**
     * Hapus data department.
     */
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')
                         ->with('success', 'Departemen berhasil dihapus.');
    }
}