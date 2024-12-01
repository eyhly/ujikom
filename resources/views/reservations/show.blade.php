@extends('layouts.app') 
@section('content')
<!-- Access $reservasi_id -->
<div id="app">
    <div class="main-wrapper">
        <div class="main-content">
            <div class="container">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="mt-2">Detail Reservasi</h3>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif 
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="row mb-3">
                                <div class="col">
                                    <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('details.create', $reservation->id) }}" class="btn btn-info">
                                        <i class="fas fa-plus"></i> Tambah Detail
                                    </a>
                                </div>
                            </div>

                            <table class="table table-bordered table-hover table-light">
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $reservation->id }}</td>
                                </tr>
                                <tr>
                                    <th>Hewan</th>
                                    <td>{{ $reservation->animal->nama_hewan }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $reservation->user->username }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ \Carbon\Carbon::parse($reservation->tanggal)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>Rp. {{ $reservation->total }}</td>
                                </tr>
                            </table>

                            <h4 class="mt-4">Detail Reservasi</h4>
                            <table class="table table-bordered table-hover table-light">
                                <thead>
                                    <tr>
                                        <th>Layanan</th>
                                        <th>Harga</th>
                                        <th>Dokter</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservation->details as $detail)
                                        <tr>
                                            <td>{{ $detail->service->nama_layanan }}</td>
                                            <td>Rp. {{ $detail->service->harga }}</td>
                                            <td>{{ $detail->doctor->nama_dokter }}</td>
                                            <td>
                                                <button class="btn btn-danger" onclick="handleDelete({{ $detail->id }})">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                                <form id="delete-form-{{ $detail->id }}" action="{{ route('details.destroy', ['reservasi_id' => $reservation->id, 'id' => $detail->id]) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function handleDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus detail ini?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
