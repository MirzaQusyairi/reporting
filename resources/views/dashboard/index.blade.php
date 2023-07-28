@extends('layouts.admin-layout')

@section('page_name', 'Dasbor')
@section('content')

<div class="row">
  <div class="col-lg-6">

    <div class="alert alert-light d-flex" style="min-height: 87%;height: 87%;">
      <div>
        @if(auth()->user()->photo)
          <img src="{{ asset('storage/'.str_replace('public/', '', auth()->user()->photo)) }}" alt="" class="rounded-circle" style=" width: 120px;height: 120px;">
        @else
          <img alt="image" src="{{ asset('stisla/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1" style=" width: 120px;height: 120px;">
        @endif
        
      </div>
        <div class="alert-title px-3 py-3 font-weight-light">Selamat Datang, <br><span class="font-weight-bold" style="font-size: 25px">{{ auth()->user()->name }}</span>
        <p>[ {{ auth()->user()->position }} ]</p>
        </div>
        
    </div>

  </div>
  <div class="col-lg-6">

    <div class="alert alert-info alert-has-icon">
      <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
      <div class="alert-body">
        <div class="alert-title">Aplikasi Sistem Pertanggungjawaban secara Elektronik (SIPERNIK)</div>
        bertujuan untuk memberikan kemudahan dan kenyamanan bagi para pemangku kepentingan dalam mencatat, melacak, dan mengelola berbagai bentuk pertanggungjawaban secara digital.
      </div>
    </div>

  </div>
  
</div>

@if(auth()->user()->role != 'administrator')

  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <a href="/report/filter/all">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-copy"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total<br>Pelaporan</h4>
            </div>
            <div class="card-body">
              {{ $totalreports }}
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <a href="/report/filter/process">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-file-upload"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pelaporan<br> Diajukan</h4>
            </div>
            <div class="card-body">
              {{ $reportsProcess }}
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <a href="/report/filter/return">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-undo-alt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pelaporan<br> Dikembalikan</h4>
            </div>
            <div class="card-body">
              {{ $reportsReturn }}
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <a href="/report/filter/accept">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-check"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pelaporan<br> Diterima</h4>
            </div>
            <div class="card-body">
              {{ $reportsAccept }}
            </div>
          </div>
        </div>
      </a>
    </div>             
  </div>

@else 

  <div class="row">
    <div class="col-lg-6">
      <a href="report/filter/process">
        <div class="card card-statistic-1 bg-warning" style="height: 88%;">
          <div class="card-icon bg-warning">
            <i class="fas fa-file-upload" style="font-size: 35px;"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4 class="text-light" style="font-size: 2rem;">Pelaporan Diajukan</h4>
            </div>
            <div class="card-body">
              <h1>{{ $reportsProcess }}</h1>
            </div>
          </div>
        </div>
      </a>
    </div>
    <div class="col-lg-6">
      <a href="report/filter/all">
        <div class="card card-statistic-1 bg-primary mb-3">
          <div class="card-icon bg-primary">
            <i class="fas fa-copy" style="font-size: 35px;"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4 class="text-light">Total Pelaporan</h4>
            </div>
            <div class="card-body">
              {{ $totalreports }}
            </div>
          </div>
        </div>
      </a>
      <div class="row">
        <div class="col">
          <a href="report/filter/return">
            <div class="card card-statistic-1 bg-danger">
              <div class="card-icon bg-danger">
                <i class="fas fa-undo-alt" style="font-size: 35px;"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4 class="text-light">Pelaporan<br> Dikembalikan</h4>
                </div>
                <div class="card-body">
                  {{ $reportsReturn }}
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col">
          <a href="report/filter/accept">
            <div class="card card-statistic-1 bg-success">
              <div class="card-icon bg-success">
                <i class="fas fa-check" style="font-size: 35px;"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Pelaporan<br> Diterima</h4>
                </div>
                <div class="card-body">
                  {{ $reportsAccept }}
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-12 col-md-6 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Grafik Pelaporan</h4>
        </div>
        <div class="card-body">
          <canvas id="myChart2"></canvas>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('stisla/assets/modules/chart.min.js') }}"></script>
  {{-- <script src="{{ asset('assets/js/page/chart.js') }}"></script> --}}
  <script>
    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: [
          @foreach ($dataChart as $dt)
            "{{ $dt->name }}",
          @endforeach
        ],
        datasets: [{
          label: 'Total Pelaporan',
          data: [
            @foreach ($dataChart as $dt)
              "{{ $dt->totalReport }}",
            @endforeach
          ],
          borderWidth: 2,
          backgroundColor: '#6777ef',
          borderColor: '#6777ef',
          borderWidth: 2.5,
          pointBackgroundColor: '#ffffff',
          pointRadius: 4
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            gridLines: {
              drawBorder: false,
              color: '#f2f2f2',
            },
            ticks: {
              beginAtZero: true,
              stepSize: 20
            }
          }],
          xAxes: [{
            ticks: {
              display: true
            },
            gridLines: {
              display: false
            }
          }]
        },
      }
    });
  </script>

@endif

@endsection