@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop</title>
  
<style>
.background {
    width: 100%;
    min-height: 100vh;
    background-image: url(asset('img/back.png'));
    background-attachment:fixed;
    background-position: top;
    background-size: 100% 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }
  
  .service-card {
    transition: transform 0.2s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    background: rgba(240, 240, 240, 0.4);
    text-align: center;
    width: 100%;
    padding-top: 2px;
    height: 100%;
  }
    
  
  .service-card:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    background-color: rgba(226, 187, 206, 0.642);
    border-color: rgba(249, 7, 124, 0.886);
  }
  
  .icon {
    width: 150px;
    margin: auto;
    margin-top: -50px;
  }
</style>

</head>
<div class="container">
<div class="row my-4">
    @foreach ($services as $service)
    <div class="col-md-4 mb-4">
        <div class="card service-card">
            <div class="card-body">
                <h5 class="card-title">{{ $service->nama_layanan }}</h5>
                <!-- Anda perlu mengganti ini dengan gambar layanan jika ada -->
                <img src="{{ asset('img/icon.png') }}" alt="Service Image" class="card-img-top">
                <p class="card-text">{{ $service->deskripsi }}</p>
                <p class="card-text">Rp. {{ $service->harga }}</p>
            </div>
        </div>
    </div>
    @endforeach
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
</body>
@endsection
