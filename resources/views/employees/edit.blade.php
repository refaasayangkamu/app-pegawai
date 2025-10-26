@extends('master')

@section('title', 'Edit Karyawan')
@section('page-title', 'Edit Karyawan')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nama_depan" class="form-label">Nama Depan</label>
            <input type="text" name="nama_depan" class="form-control" id="nama_depan" value="{{ $employee->nama_depan }}">
        </div>
        <div class="mb-3">
            <label for="nama_belakang" class="form-label">Nama Belakang</label>
            <input type="text" name="nama_belakang" class="form-control" id="nama_belakang" value="{{ $employee->nama_belakang }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $employee->email }}">
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" name="telepon" class="form-control" id="telepon" value="{{ $employee->telepon }}">
        </div>
        <div class="mb-3">
            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="{{ $employee->tanggal_masuk }}">
        </div>
        
        {{-- Dropdown untuk Foreign Key Departemen --}}
        <div class="mb-3">
            <label for="departemen_id" class="form-label">Departemen</label>
            <select name="departemen_id" id="departemen_id" class="form-select">
                <option value="">Pilih Departemen</option>
                @foreach ($departments as $dept)
                    <option value="{{ $dept->id }}" {{ $employee->departemen_id == $dept->id ? 'selected' : '' }}>
                        {{ $dept->nama_departemen }}
                    </option>
                @endforeach
            </select>
        </div>
        
        {{-- Dropdown untuk Foreign Key Jabatan --}}
        <div class="mb-3">
            <label for="jabatan_id" class="form-label">Jabatan (Position)</label>
            <select name="jabatan_id" id="jabatan_id" class="form-select">
                <option value="">Pilih Jabatan</option>
                @foreach ($positions as $pos)
                    <option value="{{ $pos->id }}" {{ $employee->jabatan_id == $pos->id ? 'selected' : '' }}>
                        {{ $pos->nama_jabatan }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('employees.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection