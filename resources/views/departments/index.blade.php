@extends ('master')

@section('content') 
<div class="container">
    <h1>Daftar Departemen</h1>
    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-3">Tambah Departemen</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama Departemen</th> {{-- [cite: 27] --}}
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($departments as $department)
        <tr>
            <td>{{ $department->id }}</td>
            <td>{{ $department->nama_departemen }}</td> {{-- [cite: 27] --}}
            <td>
                <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('departments.edit', $department->id) }}">Edit</a>
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