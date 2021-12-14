<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Daftar Hadir</title>
</head>
<body>
    <h3>DAFTAR HADIR</h3>
    <p>
        Program Studi SISTEM INFORMASI Fakultas Teknologi Informasi
    </p>
    <p>
        Universitas Kristen Duta Wacana
    </p>
    <p>Jln.Dr. Wahidin Sudirohusodo 5-25 Yogyakarta</p>
    <p>
        Telp. 0274563929 ext 321, 322
    </p>
    <p>
        No Surat : {{ $item->kode_surat }}
    </p>

    <table style="width: 80%">
        <tr>
            <td>Nama Kegiatan</td>
            <td>:</td>
            <td>{{ $item->nama_kegiatan }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td>{{ Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>:</td>
            <td>{{ Carbon\Carbon::parse($item->start)->format('H : i') }} - {{ Carbon\Carbon::parse($item->end)->format('H : i') }} WIB</td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>:</td>
            <td>{{ $item->tempat }}</td>
        </tr>
        <tr>
            <td>Pembicara</td>
            <td>:</td>
            <td>{{ $item->pembicara }}</td>
        </tr>
    </table>

    <table border="4" style="width: 100%">
        <thead>
            <tr>
                <th scope="col" >No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= $item->jumlah_peserta; $i++)
                <tr style="line-height: 40px">
                    <th>{{ $i }}</th>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endfor
        </tbody>
    </table>

    <table style="width: 100%">
			<tr>
				<td width="330"></td>
				<td class="text" align="center"><b> Dekan </b>
                    <img width="320" src="{{ public_path('upload/'. $item->sign->signs) }}" alt="">
                    {{-- {{$item->sign}} --}}
        {{-- <img src="{{ asset('upload/'. $item->sign) }}" alt=""> --}}
                    <br><br><br><br>{{ $item->sign->user->nama }}</td>
			</tr>
	     </table>
</body>
</html>