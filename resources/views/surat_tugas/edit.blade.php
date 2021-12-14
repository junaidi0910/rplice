@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
                <div class="pull-left">
                    <strong>Edit Surat Tugas Kelompok</strong>
                </div>
                <div class="pull-right">
                        <a href="{{ route('surat_tugas.index')}}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"> </i> Back
                        </a>
                </div>
            {{-- {{$item->users}} --}}
            {{-- {{$item}} --}}
        </div>
        <div class="card-body">
            <form action="{{ route('surat_tugas.update', $item->id) }}" method="POST">
                <input type="hidden" name="pengirim_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="jenis_surat" value="tugas">
                <input type="hidden" name="status" value="{{ $item->status }}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="">Penerima</label>
                    <select name="users[]" class="form-control select2 @error('penerima_id') is-invalid @enderror" id="select2" multiple>
                        <option value="">Pilih Penerima...</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @foreach ($item->users as $nama)
                                {{ $nama->id == $user->id ? 'selected' : '' }}
                            @endforeach>{{ $user->nomor_induk }} - {{ $user->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @error('penerima_id')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Tanggal Pelaksanaan</label>
                    <input type="date" value="{{ $item->tanggal_pelaksanaan }}" name="tanggal_pelaksanaan" class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror">
                </div>
                @error('tanggal_pelaksanaan')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Lokasi Pelaksanaan</label>
                    <input type="text" value="{{ $item->lokasi_pelaksanaan }}" name="lokasi_pelaksanaan" class="form-control @error('lokasi_pelaksanaan') is-invalid @enderror">
                </div>
                @error('lokasi_pelaksanaan')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Nama Mitra</label>
                    <input type="text" value="{{ $item->nama_mitra }}" name="nama_mitra" class="form-control @error('nama_mitra') is-invalid @enderror">
                </div>
                @error('nama_mitra')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Keterangan</label>
                    {{-- <input type="number" name="nomor_induk" class="form-control"> --}}
                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{ $item->keterangan }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#select2').select2()
        })
    </script>
@endsection
