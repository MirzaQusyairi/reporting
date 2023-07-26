@extends('layouts.admin-layout')

@section('page_name', 'Dasbor')
@section('content')

<div class="row">
  <div class="col-lg-12">

    <div class="alert alert-info alert-has-icon">
      <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
      <div class="alert-body">
        <div class="alert-title">Selamat Datang di Aplikasi Sistem Informasi Pertanggungjawaban Elektronik (SIFERNIK)</div>
        bertujuan untuk memberikan kemudahan dan kenyamanan bagi para pemangku kepentingan dalam mencatat, melacak, dan mengelola berbagai bentuk pertanggungjawaban secara digital.
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="fas fa-file"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Pelaporan</h4>
        </div>
        <div class="card-body">
          {{ $totalreports }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="far fa-file"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Pelaporan Diproses</h4>
        </div>
        <div class="card-body">
          {{ $reportsProcess }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-file"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Pelaporan Dikembalikan</h4>
        </div>
        <div class="card-body">
          {{ $reportsReturn }}
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="far fa-file"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Pelaporan Diterima</h4>
        </div>
        <div class="card-body">
          {{ $reportsAccept }}
        </div>
      </div>
    </div>
  </div> 
                   
</div>


@endsection