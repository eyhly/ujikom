@extends('layouts.app') 
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }
        .background {
            width: 100%;
            min-height: 100vh;
            background-image: url('img/back.png');
            background-attachment: fixed;
            background-position: top;
            background-size: cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            width: 100%;
            margin: auto;
        }
  
        .hero__caption {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .hero__caption h1 {
            color: #ff69b4;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .hero__caption p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .hero-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff69b4;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
        }
        .hero-btn:hover {
            background-color: #e056a7;
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="container">
            <div class="hero__caption">
                <span>Kami siap membantu merawat kucing anda</span>
                <h1>Kami peduli peliharaanmu!</h1>
                <p>Petshop adalah klinik hewan yang bergerak di bidang jasa layanan seperti penitipan hewan 
                   dan perawatan hewan (grooming). Tidak sedikit orang yang menggunakan jasa ini karena 
                   kebanyakan pemilik hewan kesayangan seperti anjing dan kucing ingin dipelihara dan diperlakukan sebaik mungkin.</p>
                <a href="https://petshopindonesia.com/" class="hero-btn">Contact Now<i class="ti-arrow-right"></i></a>
            </div>
        </div>
    </div>
</body>
</html>

@endsection
