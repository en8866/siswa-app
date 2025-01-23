@extends('templates.app', ['title' => 'Data Siswa'])

@section('content-dinamis')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
            <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
    @endif
    <h1 class="mb-4">Data Siswa</h1>
    <a href="{{ route('siswa.create') }}" class="btn btn-success mb-3">+ Tambah</a>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Rombel</th>
                <th>Rayon</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($siswas as $siswa)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $siswa->name }}</td>
                    <td>{{ $siswa->NIS }}</td>
                    <td>{{ $siswa->rombel }}</td>
                    <td>{{ $siswa->rayon }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
