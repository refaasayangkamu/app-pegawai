@extends('master')

@section('content')
<div class="container">
    <h1>Daftar Jabatan (Position)</h1>
    <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">Tambah Jabatan</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama Jabatan</th> {{-- [cite: 34] --}}
            <th>Gaji Pokok</th> {{-- [cite: 35] --}}
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($positions as $position)
        <tr>
            <td>{{ $position->id }}</td>
            <td>{{ $position->nama_jabatan }}</td> {{-- [cite: 34] --}}
            <td>Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</td> {{-- [cite: 35] --}}
            <td>
                <form action="{{ route('positions.destroy', $position->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('positions.edit', $position->id) }}">Edit</a>
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