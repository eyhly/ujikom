@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h3 class="mt-2">Edit Detail Reservasi</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('details.update', ['reservasi_id' => $reservasi_id, 'id' => $detail->id]) }}" method="POST">
            @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="service_id">Layanan</label>
                    <select name="service_id" class="form-control">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" {{ $detailReservation->service_id == $service->id ? 'selected' : '' }}>
                                {{ $service->nama_layanan }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="dokter_id">Dokter</label>
                    <select name="dokter_id" class="form-control">  
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $detailReservation->dokter_id == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->nama_dokter }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
