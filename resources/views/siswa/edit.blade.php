@extends('templates.app', ['title' => 'Edit Data Siswa'])

@section('content-dinamis')
    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-3 col-form-label">Nama:</label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control" value="{{ $siswa['name'] }}" placeholder="Masukkan nama siswa">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="NIS" class="col-sm-3 col-form-label">NIS:</label>
            <div class="col-sm-9">
                <input type="text" name="NIS" id="NIS" class="form-control" value="{{ $siswa['NIS'] }}" placeholder="Masukkan NIS">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rayon" class="col-sm-3 col-form-label">Rayon:</label>
            <div class="col-sm-9">
                <input type="text" name="rayon" id="rayon" class="form-control" value="{{ $siswa['rayon'] }}" placeholder="Masukkan rayon">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rombel" class="col-sm-3 col-form-label">Rombel:</label>
            <div class="col-sm-9">
                <input type="text" name="rombel" id="rombel" class="form-control" value="{{ $siswa['rombel'] }}" placeholder="Masukkan rombel">
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block mt-3">Ubah Data</button>
        </div>
    </form>

@endsection
