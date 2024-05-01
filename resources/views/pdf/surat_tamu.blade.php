<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Izin Keluar - SMK Prakarya Internasional</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #6c5ce7;
            padding-bottom: 20px;
            position: relative;
        }

        .header h2 {
            color: #6c5ce7;
            margin-bottom: 25px;
        }

        .header p {
            margin: 0;
            color: #555;
        }

        .header img {
            position: absolute;
            top: 20px;
            left: 60px;
            width: 60px;
            height: auto;
        }

        .content {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
        }

        .form-group label {
            font-weight: bold;
            color: #555;
            width: 120px;
            margin-right: 10px;
        }

        .form-group span {
            flex: 1;
        }
        .signature {
    text-align: right;
    margin-top: 10px;
    position: relative;
}

.signature p {
    margin: 35px 0;
    font-size: 16px;
    font-style: italic;
}

.signature p:first-child {
    position: absolute;
    top: 0;
    right: 0;
    border-top: 2px solid #333;
    width: 200px; /* Sesuaikan lebar garis atas */
}


        .btn-submit {
            background-color: #6c5ce7;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #4a3db4;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="{{  public_path('logo_pi.png') }}" alt="Logo SMK Prakarya Internasional">
            <h2>Surat Tamu</h2>
            <p>SMK Prakarya Internasional</p>
            <p>Jl. Inhoftank No.46-146, Pelindung Hewan, Kec. Astanaanyar, Kota Bandung, Jawa Barat 40243</p>
        </div>

        <div class="content">
            <h3>Keterangan Surat Tamu</h3>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <span>{{ $tamu->nama }}</span>
            </div>
            <div class="form-group">
                <label for="alasan">Darimana :</label>
                <span>{{ $tamu->darimana }}</span>
            </div>
            <div class="form-group">
                <label for="mapel">Kemana:</label>
                <span>{{ $tamu->kemana }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal :</label>
                <span>{{ $tamu->created_at->format('Y-m-d') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal">Jam :</label>
                <span>{{ $tamu->created_at->format('H:i') }}</span>
            </div>
            </div>

        </div>
    </div>
</body>

</html>
