<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berita Acara</title>
</head>
<body>
    <style>
        .container{
            width: 80%;
            margin : 0 auto;
        }
    </style>
    <center>
        <h2>Berita Acara</h2>
    </center>
    <center>
        <h4>{{ $item->judul }}</h4>
        <h4 style="font-style: italic">
            {{ $item->tema }}
        </h4>
        <p>No : {{ $item->no_surat }}</p>
    </center>

    <div class="container">
        <p>
            Pada hari ini : {{ Carbon\Carbon::parse($item->tanggal_pelaksanaan)->format('d M Y') }} bertempat di Ruang {{ $item->ruang }}.{{ $item->nama_tamu }}, Universitas Kristen Duta Wacana telah dilangsungkan {{ $item->judul }} dengan tema <span style="font-style: italic">{{ $item->tema }}</span> dengan mengundang pembicara yaitu Bpk.{{ $item->nama_tamu }}. Acara ini diikuti oleh seluruh civitas akademika UKDW dan perwakilan dari beberapa mitra kerjasama Fakultas Teknologi Informasi UKDW.
        </p>
        <p style="margin-top: 60px">
            Adapun TDR acara, daftar kehadiran peserta, foto kegiatan seperti terlampir pada berita acara ini.
        </p>
        <p style="margin-top: 60px">
            Demikian Berita Acara ini dibuat dengan sebenarnya,untuk dapat dipergunakan sebagaimana mestinya.
        </p>
    </div>

    <center style="margin-top: 80px">
        Yogyakarta, {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
    </center>
    <center style="margin-top: 50px">
        Mengetahui
    </center>
    <center>
        <p>Dekan</p>
        <img width="320" src="{{ public_path('upload/'. $item->sign->signs) }}" alt="">
        <p>{{ $item->sign->user->nama }}</p>
    </center>
</body>
</html>