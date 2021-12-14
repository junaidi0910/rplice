@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <strong>Tambah Surat Daftar Hadir</strong>
            </div>
            <div class="pull-right">
                    <a href="{{ route('surat_daftar_hadir.index')}}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"> </i> Back
                    </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('surat_daftar_hadir.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="form-control @error('nama_kegiatan') is-invalid @enderror">
                </div>
                @error('nama_kegiatan')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                </div>
                @error('tanggal')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Tempat</label>
                    <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror">
                </div>
                @error('tempat')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Nama Pembicara</label>
                    <input type="text" name="pembicara" class="form-control @error('pembicara') is-invalid @enderror">
                </div>
                @error('pembicara')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Jumlah Peserta</label>
                    <input type="number" name="jumlah_peserta" class="form-control @error('jumlah_peserta') is-invalid @enderror">
                </div>
                @error('jumlah_peserta')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Tanda Tangan Dosen</label>
                    <select name="sign_id" id="" class="form-control select2">
                        <option value="">Pilih Dosen..</option>
                        @foreach ($signs as $item)
                            <option value="{{ $item->id }}">{{ $item->user->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @error('sign_id')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group row">
                    <div class="col">
                        <label for="">Dari Jam</label>
                      <input type="time" class="form-control @error('start') is-invalid @enderror" name="start">
                    </div>
                    <div class="col">
                        <label for="">Sampai Jam</label>
                      <input type="time" class="form-control @error('end') is-invalid @enderror" name="end">
                    </div>
                </div>
                @error('start')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                @error('end')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('.select2').select2();
    </script>
@endsection
