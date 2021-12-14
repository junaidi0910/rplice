@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <strong>Ajukan Berita Acara</strong>
            </div>
            <div class="pull-right">
                    <a href="{{ route('berita_acara.index')}}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"> </i> Back
                    </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('berita_acara.store') }}" method="POST">
                <input type="hidden" name="pengirim_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="status" value="proses">
                <input type="hidden" name="jenis_surat" value="berita acara">
                @csrf
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror">
                </div>
                @error('judul')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Tema</label>
                    <input type="text" name="tema" class="form-control @error('tema') is-invalid @enderror">
                </div>
                @error('tema')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" name="tanggal_pelaksanaan" class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror">
                </div>
                @error('tanggal_pelaksanaan')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Ruang</label>
                    <input type="text" name="ruang" class="form-control @error('ruang') is-invalid @enderror">
                </div>
                @error('ruang')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <label for="">Nama Tamu</label>
                    <input type="text" name="nama_tamu" class="form-control @error('nama_tamu') is-invalid @enderror">
                </div>
                @error('nama_tamu')
                    <div class="form-group">
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('.select2').select2();
        $(document).ready(function() {
            // alert('halo')
        });
    </script>
@endsection
