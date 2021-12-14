@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Validasi
        </div>
        <div class="card-body">
            <form action="{{ route('tugas_pribadi.validasi', $item->id) }}" method="POST">
                @csrf
                @method('put')
                  <div class="form-group">
                      <label for="">Status</label>
                      <select name="status" id="stats" class="form-control stats">
                          <option value="proses" {{ $item->status == 'proses' ? 'selected' : '' }}>Proses</option>
                          <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Tolak</option>
                          <option value="disetujui" {{ $item->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>

                      </select>
                  </div>
                  <div class="form-group hilang" style="display: none">
                      <label for="">Tanda Tangan</label>
                      <select name="sign_id" class="form-control" id="">
                          @foreach ($signs as $u)
                              <option value="{{ $u->id }}">{{ $u->user->nama }}</option>
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
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});

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