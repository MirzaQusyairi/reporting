@extends('layouts.admin-layout')

@section('page_name', 'Data Pelaporan')

@section('content')
@include('notification.toastr')

<div class="row">
  @if (Auth::user()->role != 'administrator')
    <div class="col-12 pb-3">
      <a href="report/create" type="button" class="btn btn-primary btn-lg">Buat Pelaporan</a>
    </div>
  @endif
  
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="table-1">
            <thead>                                 
              <tr>
                <th class="text-center">
                  #
                </th>
                <th>Tanggal</th>
                @if (Auth::user()->role == 'administrator')
                  <th>Pelapor</th>
                @endif
                <th>Jenis Pengeluaran</th>
                <th>Detail Pengeluaran</th>
                <th>Bukti SPJ / Pengeluaran</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>  
              @foreach ($data as $index => $dt)    
								<tr>
									<td>{{ $index+1 }}</td>                               
									<td>{{ $dt->created_at }}</td>
                  @if (Auth::user()->role == 'administrator')
                    <td>{{ $dt->user->name }}</td>        
                  @endif        
									<td>{{ $dt->typeexpense->type }}</td>        
									<td>{{ $dt->detail }}</td> 
                  <td>
                    <button class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-view-evidence-{{ $dt->id}}"><i class="fa fa-eye"></i></button>
                    @include('report.modal-view-evidence')
                  </td>            
									<td>{{ $dt->info }}</td>           
									<td>
                    @if ($dt->status == 'process')
                      <div class="badge badge-warning">Diproses</div>
                    @elseif ($dt->status == 'return')
                      <div class="badge badge-danger">Dikembalikan</div>
                    @elseif ($dt->status == 'accept') 
                      <div class="badge badge-success">Diterima</div>
                    @endif
                  </td>          
									<td>
                    @if(auth()->user()->role == 'administrator')
                      <button class="btn btn-warning" data-toggle="modal" data-target="#modal-review-{{ $dt->id}}"><i class="fas fa-clipboard-check"></i></button>
                      @include('report.modal-review')
                    @elseif($dt->status != 'accept')
                      <a href="/report/{{ $dt->id }}/edit" class="btn btn-warning"><i class="fa fa-pen"></i></a>

                      <form id="delete-form" action="/report/{{ $dt->id }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-delete" onclick="return false"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif
                  </td>  
                  
                </tr>
              @endforeach    
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection