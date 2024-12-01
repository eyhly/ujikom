@extends('layouts.app') 
@section('content')
<div id="app">
    <div class="main-wrapper">
        <div class="main-content">
            <div class="container">
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="mt-2">Reservasi</h3>
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
                            <div class="row justify-content-start mb-3 mt-4">
                                <div class="col-auto">
                                    <a href="{{ route('reservations.create') }}">
                                        <button type="button" class="btn btn-info">
                                            <i class="fas fa-plus"></i> Tambah Reservasi
                                        </button>
                                    </a>
                                </div>
                            </div>
                            <table id="example" class="table table-striped table-bordered table-hover table-light">
                                <thead class="table-danger rounded-table">
                                    <tr>
                                        <th>ID</th>
                                        <th>Hewan</th>
                                        <th>Pemilik</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reservations as $reservation)
                                    <tr>
                                        <td>{{ $reservation->id }}</td>
                                        <td>{{ $reservation->animal->nama_hewan }}</td>
                                        <td>{{ $reservation->user->username }}</td>
                                        <td>{{ \Carbon\Carbon::parse($reservation->tanggal)->format('d-m-Y') }}</td>
                                        <td>Rp. {{ $reservation->total }}</td>
                                        <td>
                                        <a href="{{ route('reservations.show', ['id' => $reservation->id]) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <a href="{{ route('reservations.edit', ['id' => $reservation->id]) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="handleDelete({{ $reservation->id }})">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                        <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservations.destroy', ['id' => $reservation->id]) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">Tidak Ada Data Ditemukan!</td>
                                    </tr>
                                    @endforelse
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
    document.addEventListener('DOMContentLoaded', function() {
        var alertList = document.querySelectorAll('.alert');
        alertList.forEach(function(alert) {
            var button = alert.querySelector('.btn-close');
            button.addEventListener('click', function() {
                alert.classList.add('d-none');
            });
        });
    });
</script>
<script>
    function handleDelete(id) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
