@extends('layouts.app')
@section('content')
<div id="app">
    <div class="main-wrapper">
        <div class="main-content">
            <div class="container">
                <div class="card mt-2">
                    <div class="card-header">
                        <h3 class="mt-2">Dokter</h3>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered table-hover table-light">
                                <thead class="table-danger rounded-table">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Dokter</th>
                                        <th>Jam Kerja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $doctor->id }}</td>
                                        <td>{{ $doctor->nama_dokter }}</td>
                                        <td>{{ $doctor->jam_kerja }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3">Tidak Ada Data Ditemukan!</td>
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
