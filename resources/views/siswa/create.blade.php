@extends('templates.app', ['title' => 'Buat Data Siswa'])

@section('content-dinamis')
    <div class="container d-flex justify-content-center align-items-center vh-10">
        <div class="card p-4" style="width: 40rem;">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                @if (Session::get('failed'))
                    <div class="alert alert-danger my-2">{{ Session::get('failed') }}</div>
                @endif


                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label">Nama:</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama siswa" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="NIS" class="col-sm-3 col-form-label">NIS:</label>
                    <div class="col-sm-9">
                        <input type="number"  class="form-control @error('NIS') is-invalid @enderror " name="NIS" id="NIS" value="{{ old('NIS') }}" placeholder="Masukkan NIS" required>
                        @error('NIS')
                            <div class="invalid-feedback">NIS sudah dipakai</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="rayon" class="col-sm-3 col-form-label">Rayon:</label>
                    <div class="col-sm-9">
                        <input type="text" name="rayon" id="rayon" class="form-control" value="{{ old('rayon') }}" placeholder="Masukkan rayon" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="rombel" class="col-sm-3 col-form-label">Rombel:</label>
                    <div class="col-sm-9">
                        <input type="text" name="rombel" id="rombel" class="form-control" value="{{ old('rombel') }}" placeholder="Masukkan rombel" required>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block mt-3">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>
@endsection
