@extends('master')

@section('title', 'Daftar Karyawan')
@section('page-title', 'Manajemen Karyawan')

@section('content')
<div class="container">
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Karyawan Baru</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th width="280px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->nama_lengkap }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->nomor_telepon }}</td>
                <td>{{ $employee->tanggal_lahir }}</td>
                <td>{{ $employee->alamat }}</td>
                <td>{{ $employee->tanggal_masuk }}</td>
                <td>{{ $employee->status }}</td>
                

                <td>{{ $employee->department->nama_departemen ?? 'N/A' }}</td>
                <td>{{ $employee->positions->nama_jabatan ?? 'N/A' }}</td>
                
                <td>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection