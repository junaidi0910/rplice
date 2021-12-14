@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>
                <div class="pull-left">
                    <strong>Surat Daftar Hadir</strong>
                </div>
            </span>
            <div>
                <a href="{{ route('surat_daftar_hadir.create') }}" class="btn btn-primary">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="dark">
                    <tr>
                        <th scope="col">Kode Surat</th>
                        <th scope="col">Nama Kegiatan</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Nama Pembicara</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($surats as $item)
                        <tr>
                            <th>
                                {{$item->kode_surat}}
                            </th>
                            <td>
                                {{$item->nama_kegiatan}}
                            </td>
                            <td>
                                {{Carbon\Carbon::parse($item->start)->format('H : i')}} - {{Carbon\Carbon::parse($item->end)->format('H : i')}}
                            </td>
                            <td>
                                {{$item->tanggal}}
                            </td>
                            <td>
                                {{$item->tempat}}
                            </td>
                            <td>
                                {{$item->pembicara}}
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('surat_daftar_hadir.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('surat_daftar_hadir.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger ml-2">Hapus</button>
                                </form>
                                <a href="{{ route('surat_daftar_hadir.unduh', $item->id) }}" class="btn btn-warning btn-block">Unduh</a>
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
