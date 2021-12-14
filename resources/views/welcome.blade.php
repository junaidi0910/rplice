@extends('layouts.app')

@section('content')
    
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning" style="font-size: 4rem;">
                <i class="fa fa-envelope fa-10x text-primary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Tugas Pribadi</p>
                <p class="card-title">{{ $pribadis }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-plus-square"></i>
            <a href="{{ route('tugas_pribadi.create') }}">Create</a>
          </div>
        </div>
      </div>
    </div>
    @if (Auth::user()->role != 'dosen')
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning" style="font-size: 4rem;">
                <i class="fa fa-envelope fa-10x text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Tugas Kelompok</p>
                <p class="card-title">{{ $kelompoks }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-plus-square"></i>
            <a href="{{ route('surat_tugas.create') }}">Create</a>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if (Auth::user()->role == 'ppa')
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning" style="font-size: 4rem;">
                <i class="fa fa-envelope fa-10x text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Surat Daftar Hadir</p>
                <p class="card-title">{{ $hadirs }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-plus-square"></i>
            <a href="{{ route('surat_daftar_hadir.create') }}">Create</a>
          </div>
        </div>
      </div>
    </div>
    @endif
    @if (Auth::user()->role != 'mahasiswa')
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning" style="font-size: 4rem;">
                <i class="fa fa-envelope fa-10x text-info"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">Berita Acara</p>
                <p class="card-title">{{ $acaras }}<p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats">
            <i class="fa fa-plus-square"></i>
            <a href="{{ route('berita_acara.create') }}">Create</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="card">
    <div class="card-header">
      Presentase Surat
    </div>
    <div class="card-body">
      <canvas id="myChart" width="400" height="400"></canvas>
    </div>
  </div>
<script>

  const getData = async() => {
    const res = await fetch("{{ route('chart') }}")
    const json = await res.json()
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
              'Surat Pribadi', 
              @if(Auth::user()->role != 'mahasiswa')
              'Berita Acara', 
              @endif
              @if(Auth::user()->role != 'dosen')
              'Tugas Kelompok', 
              @endif
              @if(Auth::user()->role == 'ppa')
              'Surat Daftar Hadir'
              @endif
              ],
            datasets: [{
                label: '# of Votes',
                data: [
                  json.pribadis, 
                  @if(Auth::user()->role != 'mahasiswa')
                  json.acaras ,
                  @endif
                  @if(Auth::user()->role != 'dosen')
                  json.kelompoks, 
                  @endif
                  @if(Auth::user()->role == 'ppa')
                  json.hadirs 
                  @endif
                  ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    return json
  }

  getData()
</script>
@endsection