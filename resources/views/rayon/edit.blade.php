@extends('templates.app', ['title' => 'Edit Data Rayon'])

@section('content-dinamis')
    <form action="{{ route('rayon.update', $rayon->id) }}" method="POST" class="card p-5">
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
            <label for="name" class="col-sm-3 col-form-label">Nama Rayon:</label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control" value="{{ $rayon->name }}" placeholder="Masukkan nama rayon" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="pembimbing" class="col-sm-3 col-form-label">Pembimbing:</label>
            <div class="col-sm-9">
                <input type="text" name="pembimbing" id="pembimbing" class="form-control" value="{{ $rayon->pembimbing }}" placeholder="Masukkan nama pembimbing" required>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-block mt-3">Ubah Data</button>
        </div>
    </form>
@endsection
