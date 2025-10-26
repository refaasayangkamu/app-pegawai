@extends('master')

@section('content')
<div class="container">
    <h1>Tambah Data Gaji Baru</h1>

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

    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="karyawan_id" class="form-label">Karyawan</label> {{-- [cite: 96] --}}
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
            <label for="bulan" class="form-label">Bulan</label> 
            <input type="date" name="bulan" class="form-control" id="bulan" value="{{ old('bulan') }}">
        </div>
        <div class="mb-3">
            <label for="tunjangan" class="form-label">Tunjangan</label> 
            <input type="number" name="tunjangan" class="form-control" id="tunjangan" value="{{ old('tunjangan', 0) }}" step="0.01">
        </div>
        <div class="mb-3">
            <label for="potongan" class="form-label">Potongan</label> 
            <input type="number" name="potongan" class="form-control" id="potongan" value="{{ old('potongan', 0) }}" step="0.01">
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
