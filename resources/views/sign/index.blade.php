@extends('layouts.app')

@section('content')
<style>
</style>
       <div class="card">
           <div class="card-header d-flex justify-content-between">
               <span>
                    <div class="pull-left">
                        <strong>Signature</strong>
                    </div>
               </span>
               <div>
                   <a href="{{ route('tanda.create') }}" class="btn btn-primary">Tambah Tanda Tangan</a>
               </div>
           </div>
           <div class="card-body">
               <table class="table">
                   <thead class="thead-dark">
                       <tr>
                        <th scope="col">#</th>
                        <th scope="col">Dosen</th>
                        <th scope="col">Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($signs as $item)
                           <tr>
                               <th>{{ $loop->iteration }}</th>
                               <td>
                                   {{ $item->user->nama }}
                               </td>
                               <td class="d-flex">
                                   <form action="{{ route('tanda.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapusnya??')" {{ $item->user_id == Auth::user()->id ? '' : 'disabled' }}>Hapus</button>
                                    </form>
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
