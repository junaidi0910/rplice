@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Arsip Surat
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>
                        Surat Tugas Pribadi
                    </span>
                    <div>
                        {{-- <a href="{{ route('tugas_pribadi.create') }}" class="btn btn-primary">Tambah Surat Tugas</a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                             <th scope="col">#</th>
                             <th scope="col">No Surat</th>
                             <th scope="col">Pengirim</th>
                             <th scope="col">Tanggal Pelaksanaan</th>
                             <th scope="col">Lokasi Pelaksanaan</th>
                             <th scope="col">Nama Mitra</th>
                             <th scope="col">Keterangan</th>
                             <th scope="col">Status</th>
                             <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pribadis as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $item->no_surat }}
                                    </td>
                                    <td>
                                        {{$item->pengirim->nama}}
                                    </td>
                                    <td>
                                         {{  Carbon\Carbon::parse($item->tanggal_pelaksanaan)->format('d M Y') }}
                                     </td>
                                     <td>
                                         {{$item->lokasi_pelaksanaan}}
                                     </td>
                                     <td>
                                         {{$item->nama_mitra}}
                                     </td>
                                     <td>
                                         {{$item->keterangan}}
                                     </td>
                                     <td>
                                         @if ($item->status == 'proses')
                                             <div class="badge badge-primary text-uppercase">{{ $item->status }}</div>
                                         @elseif($item->status == 'ditolak')
                                             <div class="badge badge-danger text-uppercase">{{ $item->status }}</div>
                                         @else
                                             <div class="badge badge-success text-uppercase">{{ $item->status }}</div>
                                         @endif
                                     </td>
                                    <td class="d-flex">
                                        {{-- <img src="{{ asset('upload/'. $item->sign) }}" alt=""> --}}
                                        {{-- @if ($item->status != 'disetujui' && Auth::user()->role == 'dosen' || Auth::user()->role == 'mahasiswa')
                                        <a href="{{ route('tugas_pribadi.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('tugas_pribadi.destroy', $item->id) }}" method="POST">
                                         @csrf
                                         @method('delete')
                                         <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapusnya??')">Hapus</button>
                                         </form>
                                         @elseif(Auth::user()->role == 'ppa' && $item->status != 'disetujui')
                                         <a href="{{ route('tugas_pribadi.show', $item->id) }}" class="btn btn-info">Validasi</a>
                                        @endif
                                        @if ($item->status == 'disetujui') --}}
                                         <a href="{{ route('tugas_pribadi.download', $item->id) }}" class="btn btn-warning btn-block">Unduh</a>
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
        
                        {{ $pribadis    ->links('vendor.bootstrap-4') }}
        
                    </ul>
                </div>
            </div>
            @if (Auth::user()->role != 'dosen')
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>
                        Surat Tugas Kelompok
                    </span>
                    <div>
                        {{-- <a href="{{ route('surat_tugas.create') }}" class="btn btn-primary">Tambah Surat Tugas</a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                             <th scope="col">#</th>
                             <th scope="col">No Surat</th>
                             <th scope="col">Pengirim</th>
                             <th scope="col">Tanggal Pelaksanaan</th>
                             <th scope="col">Lokasi Pelaksanaan</th>
                             <th scope="col">Nama Mitra</th>
                             <th scope="col">Keterangan</th>
                             <th scope="col">Penerima</th>
                             <th scope="col">Status</th>
                             <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelompoks as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $item->no_surat }}
                                    </td>
                                    <td>
                                        {{$item->pengirim->nama}}
                                    </td>
                                    <td>
                                         {{  Carbon\Carbon::parse($item->tanggal_pelaksanaan)->format('d M Y') }}
                                     </td>
                                     <td>
                                         {{$item->lokasi_pelaksanaan}}
                                     </td>
                                     <td>
                                         {{$item->nama_mitra}}
                                     </td>
                                     <td>
                                         {{$item->keterangan}}
                                     </td>
                                     <td>
                                         @foreach ($item->users as $user)
                                             <li>{{ $user->nama }}</li>
                                         @endforeach
                                     </td>
                                     <td>
                                         @if ($item->status == 'proses')
                                             <div class="badge badge-primary text-uppercase">{{ $item->status }}</div>
                                         @elseif($item->status == 'ditolak')
                                             <div class="badge badge-danger text-uppercase">{{ $item->status }}</div>
                                         @else
                                             <div class="badge badge-success text-uppercase">{{ $item->status }}</div>
                                         @endif
                                     </td>
                                    <td class="d-flex">
                                        {{-- <img src="{{ asset('upload/'. $item->sign) }}" alt=""> --}}
                                        @if ($item->status != 'disetujui' && Auth::user()->role == 'dosen' || Auth::user()->role == 'mahasiswa')
                                        <a href="{{ route('surat_tugas.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('surat_tugas.destroy', $item->id) }}" method="POST">
                                         @csrf
                                         @method('delete')
                                         <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapusnya??')">Hapus</button>
                                         </form>
                                         @elseif(Auth::user()->role == 'ppa' && $item->status != 'disetujui')
                                         <a href="{{ route('surat_tugas.show', $item->id) }}" class="btn btn-info">Validasi</a>
                                        @endif
                                        @if ($item->status == 'disetujui')
                                         <a href="{{ route('surat_tugas.download', $item->id) }}" class="btn btn-warning btn-block">Unduh</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
        
                        {{ $kelompoks    ->links('vendor.bootstrap-4') }}
        
                    </ul>
                </div>
            </div>
            @endif

            @if(Auth::user()->role == 'ppa' || Auth::user()->role == 'dosen')
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <span>
                        Berita Acara
                    </span>
                    <div>
                        {{-- <a href="{{ route('berita_acara.create') }}" class="btn btn-primary">+ Ajukan</a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="dark">
                            <tr>
                                <th scope="col">Kode Surat</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Tema</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Ruang</th>
                                <th scope="col">Nama Tamu</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($acaras as $item)
                                <tr>
                                    <th>
                                        {{$item->no_surat}}
                                    </th>
                                    <td>
                                        {{$item->judul}}
                                    </td>
                                    <td>
                                        {{$item->tema}}
                                    </td>
                                    <td>
                                        {{$item->tanggal_pelaksanaan}}
                                    </td>
                                    <td>
                                        {{$item->ruang}}
                                    </td>
                                    <td>
                                        {{$item->nama_tamu}}
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{$item->status}}</span>
                                    </td>
                                    <td>
                                        @if ($item->status != 'disetujui' && Auth::user()->role == 'dosen')
                                           <a href="{{ route('berita_acara.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                           <form action="{{ route('berita_acara.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapusnya??')">Hapus</button>
                                            </form>
                                            @elseif(Auth::user()->role == 'ppa' && $item->status != 'disetujui')
                                            <a href="{{ route('berita_acara.validasi', $item->id) }}" class="btn btn-info">Validasi</a>
                                           @endif
                                           @if ($item->status == 'disetujui')
                                            <a href="{{ route('berita_acara.download', $item->id) }}" class="btn btn-warning btn-block">Unduh</a>
                                           @endif
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td>
                                    Belum Ada Data
                                </td>
                            </tr>
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
        
                        {{ $acaras    ->links('vendor.bootstrap-4') }}
        
                    </ul>
                </div>
            </div>

            @endif
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between">
                    <span>
                        Surat Daftar Hadir
                    </span>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="dark">
                            <tr>
                                <th scope="col">Kode Surat</th>
                                <th scope="col">Nama Kegiatan</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Tempat</th>
                                <th scope="col">Pembicara</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($hadirs as $item)
                                <tr>
                                    <th>
                                        {{$item->kode_surat}}
                                    </th>
                                    <td>
                                        {{$item->nama_kegiatan}}
                                    </td>
                                    <td>
                                        {{$item->tanggal}}
                                    </td>
                                    <td>
                                        {{Carbon\Carbon::parse($item->start)->format('H : i')}} - {{Carbon\Carbon::parse($item->end)->format('H : i')}}
                                    </td>
                                    <td>
                                        {{$item->tempat}}
                                    </td>
                                    <td>
                                        {{$item->pembicara}} 
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{$item->status}}</span>
                                    </td>
                                    <td class="d-flex">
                                        {{-- <a href="{{ route('surat_daftar_hadir.show', $item->id) }}" class="btn btn-warning">Detail</a>
                                        <form action="{{ route('surat_daftar_hadir.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger mx-3" onclick="return confirm('Yakin Ingin Menghapusnya?')">Hapus</button>
                                        </form>
                                        <a href="{{ route('surat_daftar_hadir.edit', $item->id) }}" class="btn btn-success">Edit</a> --}}
                                        <a href="{{ route('surat_daftar_hadir.unduh', $item->id) }}" class="btn btn-info ml-3">Unduh</a>
                                        {{-- @if ($item->status != 'diterima' && Auth::user()->role == 'mahasiswa')
                                           <a href="{{ route('tugas_pribadi.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                           <form action="{{ route('tugas_pribadi.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapusnya??')">Hapus</button>
                                            </form>
                                            @elseif(Auth::user()->role == 'admin' && $item->status != 'diterima')
                                            <a href="{{ route('tugas_pribadi.validasi', $item->id) }}" class="btn btn-info">Validasi</a>
                                           @endif
                                           @if ($item->status == 'diterima')
                                            <a href="{{ route('tugas_pribadi.download', $item->id) }}" class="btn btn-warning btn-block">Unduh</a>
                                           @endif --}}
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td>
                                    Belum Ada Data
                                </td>
                            </tr>
                                
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
        
                        {{ $hadirs    ->links('vendor.bootstrap-4') }}
        
                    </ul>
                </div>
            </div>
            {{-- @endif --}}
        </div>
    </div>
@endsection