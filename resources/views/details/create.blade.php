
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Reservasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .form-container {
            width: 350px;
            height: auto;
            background-color: #fff;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            box-sizing: border-box;
            padding: 20px 30px;
            margin: auto;
            margin-top: 85px;
        }
        .title {
            text-align: center;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            font-size: 28px;
            font-weight: 800;
        }
        .form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 15px;
        }
        .input {
            border-radius: 20px;
            border: 1px solid #c0c0c0;
            outline: 0 !important;
            box-sizing: border-box;
            padding: 12px 15px;
        }
        .form-btn {
            padding: 10px 15px;
            font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
                "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
            border-radius: 20px;
            border: 0 !important;
            outline: 0 !important;
            background: rgba(33, 99, 158, 0.8);
            color: white;
            cursor: pointer;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }
        .form-btn:active {
            box-shadow: none;
        }
    </style>
</head>
<body style="background-color: rgb(243,218,232);">
    <div class="form-container">
        <form class="form" name="myForm" method="post" action="{{ route('details.store', ['reservasi_id' => $reservasi_id]) }}" id="detailReservationForm">
            @csrf
            <div class="title">
                <h3>Tambah Detail Reservasi</h3>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <div class="alert-title"><h4>Whoops!</h4></div>
                    There are some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif 
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif 
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <input type="text" class="input" name="reservasi_id" value="{{ $reservasi_id }}" readonly />
            <select class="input" name="service_id" required>
                <option value="">Pilih Layanan</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->nama_layanan }}</option>
                @endforeach
            </select>
            <select class="input" name="dokter_id" required>
                <option value="">Pilih Dokter</option>
                @foreach($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->nama_dokter }}</option>
                @endforeach
            </select>
            <button class="form-btn" type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>

