<!DOCTYPE html>
<html>
<head>
	<title>output surat tugas</title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
            /* color: blue; */
			font-size: 13px;
		}
		table tr .text {
			/* text-align: center; */
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<table style="width: 100%">
			<tr>
				<td><img src="" width="90" height="90"></td>
				<td>
				<center>
                    <font size="3"><b>UNIVERSITAS KRISTEN DUTA WACANA</b></font><br>
                    <font size="5"><b>FAKULTAS TEKNOLOGI INFORMASI</b></font><br>
					<font size="4">SUART TUGAS 2021</font><br>
                    <font size="3">NO SURAT : {{ $item->no_surat }}</font><br>
					<font size="2"><i>Jln roma No. 02 Kode Pos : 68173 Telp./Fax (0331)758005 Yogyakarta</i></font>
				</center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		<table style="width : 100%">
			<tr>
                <td></td>
				<td class="text2">Yogyakarta, {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
			</tr>
		</table>
		</table>
		<table>
			<tr class="text2">
				<td>Nomer</td>
				<td width="572">: {{ $item->no_surat }}</td>
			</tr>
			{{-- <tr>
				<td>Perihal</td>
				<td width="564">: -</td>
			</tr> --}}
		</table>
		
		<table width="625">
			<tr>
		       <td>
			       <font size="2"><br>Dengan ini Dekan Fakultas teknologi Informasi Universitas Kristen Duta Wacana memberikan tugas kepada para mahasiswa/i <br>di bawah ini ;</font>
		       </td>
		    </tr>
		</table>
        <table style="width: 100%;" border="2">
            <thead>
                <tr>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item->users as $user)
                <tr>
                    <th>
                        {{$user->nomor_induk}}
                    </th>
                    <th>
                        {{$user->nama}}
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table width="625">
			<tr>
		       <td>
			       <font size="2"><br>Untuk mengikuti kunjungan penelitian yang dilaksanakan oleh Bapak {{ $item->pengirim->nama }} kunjungan akan dilaksanakan pada;</font>
		       </td>
		    </tr>
		</table>
		</table>
		<table>
			<tr class="text2">
				<td>Tanggal</td>
				<td width="541">: <b>{{ Carbon\Carbon::parse($item->tanggal_pelaksanaan)->format('d M Y') }}</b></td>
			</tr>
			{{-- <tr>
				<td>Jam</td>
				<td width="525">: <b> 08:30 </b></td>
			</tr> --}}
			<tr>
				<td>Tempat</td>
				<td width="525">: <b> {{ $item->lokasi_pelaksanaan }} </b></td>
			</tr>
		</table>
		<br>
		<table width="625">
			<tr>
		       <td>
			       <font size="2">Dimikian surat tugas ini di buat agar di pergunakan sebagaimana perlunya, Kepada penerima tugas selesai menerima tugas dimohon <br>menyampaikan laporan kepada pemberi tugas.
</font>
		       </td>
		    </tr>
		</table>
		<br>
        <br>
		{{-- {{$item->sign->signs}} --}}
		{{-- <img src="{{ public_path('upload/'. $item->sign->signs) }}" alt=""> --}}
		<table style="width: 100%">
			<tr>
				<td width="330"></td>
				<td class="text" align="center"><b> Dekan </b>
                    <img width="320" src="{{ public_path('upload/'. $item->sign->signs) }}" alt="">
        {{-- <img src="{{ asset('upload/'. $item->sign) }}" alt=""> --}}
                    <br><br><br><br>{{ $item->sign->user->nama }}</td>
			</tr>
	     </table>
	</center>
</body>
</html>