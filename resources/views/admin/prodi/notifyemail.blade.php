<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Notify</title>
    <style>
        body {
            background-color: #bdc3c7;
            margin: 0;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            margin: 20%;
            text-align: center;
            margin: 0px auto;
            width: 580px;
            max-width: 580px;
            margin-top: 10%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        }

        .garis {
            width: 75%;
        }

    </style>
</head>

<body>
    <div class="card">
        <hr class="garis">
        @component('mail::message')
            <h3 class="___class_+?2___">Halo {{ $data['nama'] }}</h3>
            <h2>Judul Kamu <strong>{{ $data['judul'] }}</strong></h2>
            <h1>Telah <strong>{{ $data['status'] == '1' ? 'Diterima' : 'Ditolak' }}</strong> oleh dosen.</h1>
            <h3></h3>
            <p>Jika judulmu diterima, silahkan lanjutkan untuk membuat proposal.
                Terima kasih</p>
            <br>
            @component('mail::button', ['url' => $data['url']], $data)
            Visit
            @endcomponent
        @endcomponent
    </div>
</body>

</html>
