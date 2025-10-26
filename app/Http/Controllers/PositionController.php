<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Tampilkan semua data position.
     */
    public function index()
    {
        $positions = Position::latest()->get();
        return view('positions.index', compact('positions'));
    }

    /**
     * Tampilkan form untuk membuat position baru.
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Simpan position baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data berdasarkan migration
        $request->validate([
            'nama_jabatan' => 'required|string|max:100', // [cite: 34]
            'gaji_pokok' => 'required|numeric|min:0', // [cite: 35]
        ]);

        Position::create($request->all());

        return redirect()->route('positions.index')
                         ->with('success', 'Jabatan (Position) berhasil ditambahkan.');
    }

    /**
     * Tampilkan form untuk mengedit position.
     */
    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    /**
     * Update data position di database.
     */
    public function update(Request $request, Position $position)
    {
        // Validasi data
        $request->validate([
            'nama_jabatan' => 'required|string|max:100', // [cite: 34]
            'gaji_pokok' => 'required|numeric|min:0', // [cite: 35]
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')
                         ->with('success', 'Jabatan (Position) berhasil diperbarui.');
    }

    /**
     * Hapus data position.
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('positions.index')
                         ->with('success', 'Jabatan (Position) berhasil dihapus.');
    }
}