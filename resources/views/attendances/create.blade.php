@extends('master')

@section('content')
<div class="container">
    <h1>Tambah Data Absensi Baru</h1>

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

    <form action="{{ route('attendances.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="karyawan_id" class="form-label">Karyawan</label> {{-- [cite: 75] --}}
            <select name="karyawan_id" class="form-select" id="karyawan_id">
                <option value="">Pilih Karyawan</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                        {{ $employee->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label> {{-- [cite: 76] --}}
            <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ old('tanggal') }}">
        </div>

        <div class="mb-3">
            <label for="waktu_masuk" class="form-label">Waktu Masuk</label> {{-- [cite: 77] --}}
            <input type="time" name="waktu_masuk" class="form-control" id="waktu_masuk" value="{{ old('waktu_masuk') }}">
        </div>

        <div class="mb-3">
            <label for="waktu_keluar" class="form-label">Waktu Keluar</label> {{-- [cite: 78] --}}
            <input type="time" name="waktu_keluar" class="form-control" id="waktu_keluar" value="{{ old('waktu_keluar') }}">
        </div>

        <div class="mb-3">
            <label for="status_absensi" class="form-label">Status Absensi</label> {{-- [cite: 79] --}}
            <select name="status_absensi" class="form-select" id="status_absensi">
                <option value="">Pilih Status</option>
                <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="izin" {{ old('status_absensi') == 'izin' ? 'selected' : '' }}>Izin</option>
                <option value="sakit" {{ old('status_absensi') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="alpha" {{ old('status_absensi') == 'alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection