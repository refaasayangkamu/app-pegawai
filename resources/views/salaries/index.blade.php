@extends('master')

@section('content')
<div class="container">
    <h1>Data Gaji (Salary)</h1>
    <a href="{{ route('salaries.create') }}" class="btn btn-primary mb-3">Tambah Data Gaji</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Karyawan</th> 
            <th>Bulan</th> 
            <th>Gaji Pokok</th> 
            <th>Total Gaji</th> 
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($salaries as $salary)
        <tr>
            <td>{{ $salary->id }}</td>
            <td>{{ $salary->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</td> 
            <td>{{ $salary->bulan }}</td> {{-- [cite: 97] --}}
            <td>Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td> 
            <td>Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}</td> 
            <td>
                <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('salaries.edit', $salary->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection