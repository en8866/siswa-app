@extends('templates.app', ['title' => 'Buat Data Rayon'])

@section('content-dinamis')
<div class="container d-flex justify-content-center align-items-center vh-10">
    <div class="card p-4" style="width: 40rem;">
        <form action="{{ route('rayon.store') }}" method="POST">
            @csrf
            @if (Session::get('failed'))
                <div class="alert alert-danger my-2">{{ Session::get('failed') }}</div>
            @endif

            <div class="mb-3 row">
                <label for="name" class="col-sm-3 col-form-label">Nama Rayon:</label>
                <div class="col-sm-9">
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Masukkan nama rayon" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block mt-3">Tambah Rayon</button>
            </div>
        </form>
    </div>
</div>
@endsection
