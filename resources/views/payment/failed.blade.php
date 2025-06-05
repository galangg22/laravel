<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pembayaran Gagal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8d7da;
            padding: 20px;
        }
        h1 {
            color: #721c24;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .status {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 15px;
            border-radius: 5px;
            font-size: 18px;
            text-align: center;
        }
        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pembayaran Gagal</h1>
        <div class="status">
            Pembayaran Anda tidak berhasil diproses. Silakan coba lagi atau hubungi customer support.
        </div>
        <a href="{{ route('payment.index') }}">Coba Lagi</a>
    </div>
</body>
</html>
