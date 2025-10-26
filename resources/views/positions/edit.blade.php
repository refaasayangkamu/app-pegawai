@extends('master')

@section('content')
<div class="container">
    <h1>Edit Jabatan</h1>

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

    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_jabatan" class="form-label">Nama Jabatan</label> {{-- [cite: 34] --}}
            <input type="text" name="nama_jabatan" class="form-control" id="nama_jabatan" value="{{ $position->nama_jabatan }}">
        </div>
        <div class="mb-3">
            <label for="gaji_pokok" class="form-label">Gaji Pokok</label> {{-- [cite: 35] --}}
            <input type="number" name="gaji_pokok" class="form-control" id="gaji_pokok" value="{{ $position->gaji_pokok }}" step="0.01">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection