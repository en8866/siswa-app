@extends('templates.app', ['title' => 'Data Rayon'])

@section('content-dinamis')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-danger">{{ Session::get('deleted') }}</div>
    @endif
    <h1 class="mb-4">Data Rayon</h1>
    <a href="{{ route('rayon.create') }}" class="btn btn-success mb-3">+ Tambah</a>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Rayon</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($rayons as $rayon)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $rayon->name }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('rayon.edit', $rayon->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="showModal('{{ $rayon->id }}', '{{ $rayon->name }}')">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="form-delete-rayon" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Rayon</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus rayon <strong id="name-rayon"></strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showModal(id, name) {
        let action = "{{ route('rayon.destroy', ':id') }}";
        action = action.replace(':id', id);
        document.getElementById('form-delete-rayon').setAttribute('action', action);
        document.getElementById('name-rayon').textContent = name;
        var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
        modal.show();
    }
</script>
@endpush
