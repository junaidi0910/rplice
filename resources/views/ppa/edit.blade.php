@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="pull-left">
                <strong>Edit Data PPA</strong>
            </div>
            <div class="pull-right">
                    <a href="{{ route('ppa.index')}}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"> </i> Back
                    </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('ppa.update', $ppa->id) }}" method="POST">
                <input type="hidden" name="role" value="ppa">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" value="{{ $ppa->username }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" value="{{ $ppa->nama }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{ $ppa->email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No HP</label>
                    <input type="number" name="np_hp" value="{{ $ppa->np_hp }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nomor Induk</label>
                    <input type="number" name="nomor_induk" value="{{ $ppa->nomor_induk }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
