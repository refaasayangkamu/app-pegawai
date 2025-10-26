@extends('master')

@section('content')
<div class="container">
    <h1>Edit Data Gaji</h1>

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

    <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="karyawan_id" class="form-label">Karyawan</label> 
            <select name="karyawan_id" class="form-select" id="karyawan_id">
                <option value="">Pilih Karyawan</option>
                @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $salary->karyawan_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label> 
            <input type="text" name="bulan" class="form-control" id="bulan" value="{{ $salary->bulan }}">
        </div>
        <div class="mb-3">
            <label for="tunjangan" class="form-label">Tunjangan</label> 
            <input type="number" name="tunjangan" class="form-control" id="tunjangan" value="{{ $salary->tunjangan }}" step="0.01">
        </div>
        <div class="mb-3">
            <label for="potongan" class="form-label">Potongan</label> 
            <input type="number" name="potongan" class="form-control" id="potongan" value="{{ $salary->potongan }}" step="0.01">
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@push('scripts')
