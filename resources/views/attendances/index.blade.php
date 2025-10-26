@extends('master')

@section('content')
<div class="container">
    <h1>Data Absensi (Attendance)</h1>
    <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">Tambah Data Absensi</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Karyawan</th>
            <th>Tanggal</th> {{-- [cite: 76] --}}
            <th>Waktu Masuk</th> {{-- [cite: 77] --}}
            <th>Waktu Keluar</th> {{-- [cite: 78] --}}
            <th>Status</th> {{-- [cite: 79] --}}
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($attendances as $attendance)
        <tr>
            <td>{{ $attendance->id }}</td>
            <td>{{ $attendance->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</td> 
            <td>{{ $attendance->tanggal }}</td>
            <td>{{ $attendance->waktu_masuk }}</td>
            <td>{{ $attendance->waktu_keluar }}</td>
            <td>{{ $attendance->status_absensi }}</td>
            <td>
                <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('attendances.edit', $attendance->id) }}">Edit</a>
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