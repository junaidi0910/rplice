@extends('layouts.app')

@section('content')
       <div class="card">
           <div class="card-header d-flex justify-content-between">
               <span>
                   Dosen Management
               </span>
               <div>
                   <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
               </div>
           </div>
           <div class="card-body">
               <table class="table">
                   <thead class="thead-dark">
                       <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($dosens as $item)
                           <tr>
                               <th>{{ $loop->iteration }}</th>
                               <td>
                                   {{ $item->username }}
                               </td>
                               <td>
                                   {{$item->nama}}
                               </td>
                               <td>
                                   <span class="text-uppercase">{{ $item->role }}</span>
                               </td>
                               <td class="d-flex">
                                   <a href="{{ route('dosen.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                   <form action="{{ route('dosen.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapusnya??')">Hapus</button>
                                    </form>
                               </td>
                           </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
@endsection
