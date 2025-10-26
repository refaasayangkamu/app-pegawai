@extends('master')

@section('content')
<div class="container">
    <h1>Tambah Departemen Baru</h1>

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

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_departemen" class="form-label">Nama Departemen</label> {{-- [cite: 27] --}}
            <input type="text" name="nama_departemen" class="form-control" id="nama_departemen" value="{{ old('nama_departemen') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection