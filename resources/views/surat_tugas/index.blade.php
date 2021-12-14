@extends('layouts.app')

@section('content')
<style>
</style>
       <div class="card">
           <div class="card-header d-flex justify-content-between">
               <span>
                    <div class="pull-left">
                        <strong>Surat Tugas Kelompok</strong>
                    </div>
               </span>
               <div>
                   <a href="{{ route('surat_tugas.create') }}" class="btn btn-primary">Tambah</a>
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
                       @foreach ($surats as $item)
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
                                   @if ($item->status != 'disetujui' && Auth::user()->role != 'ppa')
                                   <a href="{{ route('surat_tugas.edit', $item->id) }}" class="btn btn-success">Edit</a>
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
       </div>

       <script>
           var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});

           let stats = document.querySelectorAll('.stats')
            let hilang = document.querySelectorAll('.hilang')

        //    stats.addEventListener('change', function(e) {
        //        if(e.target.value == 'disetujui'){
        //             hilang.style.display == 'none
        //             alert('disetujui')
        //        }
        //    })
        stats.forEach(a => {
            a.addEventListener('change', (e) => {
            if(e.target.value == 'disetujui'){
                hilang.style.display = 'block'
            }else{
                hilang.style.display = 'none'
            }
        })
        })
       </script>
@endsection
