@extends('layouts.app')

@section('content')
<style>
    .kbw-signature { width: 50%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
</style>
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <strong>Buat Tanda Tangan</strong>
            </div>
            <div class="pull-right">
                    <a href="{{ route('tanda.index')}}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"> </i> Back
                    </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('tanda.store') }}" method="POST">

                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="form-group">
                    @error('user_id')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="">Tanda Tangan</label>
                    {{-- <label for="">Tanda Tangan</label> --}}
                      <div id="sig">
                          {{-- <canvas></canvas> --}}
                      </div>
                      <textarea id="signature64" name="signed" style="display: none"></textarea>
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
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        // $('.sig').signature({syncField: '.sig64', syncFormat: 'PNG'});
        $(document).ready(function() {
            $('#select2').select2()
            // alert('halo')
        })


    </script>
@endsection
