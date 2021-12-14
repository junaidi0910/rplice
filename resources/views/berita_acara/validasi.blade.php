@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Validasi
        </div>
        <div class="card-body">
            <form action="{{ route('berita_acara.validate', $surat->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" id="" class="form-control stats">
                        <option value="proses" {{ $surat->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="ditolak" {{ $surat->status == 'ditolak' ? 'selected' : '' }}>Tolak</option>
                        <option value="disetujui" {{ $surat->status == 'disetujui' ? 'selected' : '' }}>Terima</option>
                    </select>
                </div>
                <div class="form-group hilang" style="display: none">
                    <label for="">Tanda Tangan</label>
                    <select name="sign_id" id="" class="form-control select2">
                        <option value="">Pilih Tanda Tangan</option>
                        @foreach ($signs as $item)
                            <option value="{{ $item->id }}">{{ $item->user->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group dissapear" style="display: none">
                    <label for="">Alasan Ditolak</label>
                    <textarea name="alasan_ditolak" id="" cols="30" rows="10" class="form-control">{{ $item->alasan_ditolak }}</textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
   let stats = document.querySelector('.stats')
 let hilang = document.querySelector('.hilang')
 let dissapear = document.querySelector('.dissapear')

if(stats.value == 'ditolak'){
    dissapear.style.display = 'block'
    hilang.style.display = 'none'
}else if(stats.value == 'disetujui'){
    hilang.style.display = 'block'
     dissapear.style.display = 'none'
}else{
    hilang.style.display = 'none'
     dissapear.style.display = 'none'
}

//    stats.addEventListener('change', function(e) {
//        if(e.target.value == 'disetujui'){
//             hilang.style.display == 'none
//             alert('disetujui')
//        }
//    })
 stats.addEventListener('change', (e) => {
 if(e.target.value == 'disetujui'){
     hilang.style.display = 'block'
     dissapear.style.display = 'none'
 }else if(e.target.value == 'ditolak'){
    dissapear.style.display = 'block'
    hilang.style.display = 'none'
 }else{
     hilang.style.display = 'none'
     dissapear.style.display = 'none'
 }
})
    </script>
@endsection