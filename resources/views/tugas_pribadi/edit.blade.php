@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <strong>Edit Surat Tugas Pribadi</strong>
            </div>
            <div class="pull-right">
                    <a href="{{ route('tugas_pribadi.index')}}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"> </i> Back
                    </a>
            </div>
            {{-- {{$item->users}} --}}
            {{-- {{$item}} --}}
        </div>
        <div class="card-body">
            <form action="{{ route('tugas_pribadi.update', $item->id) }}" method="POST">
                <input type="hidden" name="pengirim_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="jenis_surat" value="pribadi">
                <input type="hidden" name="status" value="{{ $item->status }}">
                @method('put')
                @csrf
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
                        Submit
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
