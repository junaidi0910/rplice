@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>
                <div class="pull-left">
                    <strong>Berita Acara</strong>
                </div>
            </span>
            <div>
                <a href="{{ route('berita_acara.create') }}" class="btn btn-primary">Tambah</a>
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
                    @forelse ($surats as $item)
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
                                   <a href="{{ route('berita_acara.edit', $item->id) }}" class="btn btn-success">Edit</a>
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
    </div>
@endsection
