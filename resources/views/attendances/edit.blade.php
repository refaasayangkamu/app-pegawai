@extends('master')

@section('content')
<div class="container">
    <h1>Edit Data Absensi</h1>

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

    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="karyawan_id" class="form-label">Karyawan</label> {{-- [cite: 75] --}}
            <select name="karyawan_id" class="form-select" id="karyawan_id">
                <option value="">Pilih Karyawan</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $attendance->karyawan_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->nama_lengkap }} 
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label> 
            <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $attendance->tanggal }}">
        </div>

        <div class="mb-3">
            <label for="waktu_masuk" class="form-label">Waktu Masuk</label> 
            <input type="time" name="waktu_masuk" class="form-control" id="waktu_masuk" value="{{ $attendance->waktu_masuk }}">
        </div>

        <div class="mb-3">
            <label for="waktu_keluar" class="form-label">Waktu Keluar</label> 
            <input type="time" name="waktu_keluar" class="form-control" id="waktu_keluar" value="{{ $attendance->waktu_keluar }}">
        </div>

        <div class="mb-3">
            <label for="status_absensi" class="form-label">Status Absensi</label> 
            <select name="status_absensi" class="form-select" id="status_absensi">
                <option value="hadir" {{ $attendance->status_absensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
                <option value="izin" {{ $attendance->status_absensi == 'izin' ? 'selected' : '' }}>Izin</option>
                <option value="sakit" {{ $attendance->status_absensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
                <option value="alpha" {{ $attendance->status_absensi == 'alpha' ? 'selected' : '' }}>Alpha</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection