@extends('layouts.admin-layout')

@section('page_name', 'Data Pengguna')

@section('content')
@include('notification.toastr')

<div class="row">
  <div class="col-12 pb-3">
    <button type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-create-user">Tambah Pengguna</button>
  </div>
  
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
                <th>Name</th>
                <th>Email</th>
                <th>No Pegawai</th>
                <th>Jabatan</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Tipe Pengguna</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>  
              @foreach ($data as $index => $dt)    
								<tr>
									<td>{{ $index+1 }}</td>                               
									<td>{{ $dt->name }}</td>        
									<td>{{ $dt->email }}</td>          
									<td>{{ $dt->employee_id }}</td>          
									<td>{{ $dt->position }}</td>          
									<td>{{ $dt->phone }}</td>          
									<td>{{ $dt->address }}</td>          
									<td>
                    @if ($dt->role == 'administrator')
                      <div class="badge badge-primary">Sekretariat</div>
                    @else
                      <div class="badge badge-secondary">Anggota</div>
                    @endif
                  </td>          
									<td>
                    @if($dt->status == 1)
                      <div class="badge badge-success">Aktif</div>
                    @else
                      <div class="badge badge-danger">NonAktif</div>
                    @endif
                  </td>          
									<td>
                    @if ($dt->status == 1)
                      <a href="/user/status/{{ $dt->id }}" class="btn btn-success btn-sm"><i class="fa fa-power-off"></i></a>
                    @else
                      <a href="/user/status/{{ $dt->id }}" class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i></a>
                    @endif

                    <button class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#modal-edit-user-{{ $dt->id}}"><i class="fa fa-pen"></i></button>

                    <form id="delete-form" action="/user/{{ $dt->id }}" method="POST" class="d-inline">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger btn-sm btn-delete" onclick="return false"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>  
                  
                  @include('user.modal-edit')
                </tr>
              @endforeach    
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@include('user.modal-create')

@endsection
