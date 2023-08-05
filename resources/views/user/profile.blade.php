@extends('layouts.admin-layout')

@section('page_name', 'Profil')

@section('content')
@include('notification.toastr')

<div class="row mt-sm-4">
  <div class="col-12 col-md-12 col-lg-5">
    <div class="card profile-widget">
      <div class="profile-widget-header">         
        @if($data->photo)
          <img src="{{ asset('storage/'.str_replace('public/', '', $data->photo)) }}" alt="" class="rounded-circle profile-widget-picture" style=" width: 100px;height: 100px;">
        @else
          <img alt="image" src="{{ asset('stisla/assets/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
        @endif      
      </div>
      <div class="profile-widget-description">
        <div class="profile-widget-name text-center text-md-left">{{ $data->name }}<div class="text-muted d-inline font-weight-normal"><div class="slash"></div>{{ $data->position }}</div></div>
        
      </div>
    </div>
  </div>
  <div class="col-12 col-md-12 col-lg-7">
    <div class="card">
      <form action="{{ route('user.update_profile') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="card-header">
          <h4>Ubah Profil</h4>
        </div>
        <div class="card-body">
            <div class="row">                               
              <div class="form-group col-md-7 col-12">
                <label>Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $data->name) }}">
                @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group col-md-5 col-12">
                <label>Telepon</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone', $data->phone) }}">
                @error('phone')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label>Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $data->email) }}">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group col-md-6 col-12">
                <label>Kata Sandi</label>
                <div class="input-group">
                  <input type="password" class="form-control password @error('password') is-invalid @enderror" name="password" id="password-{{ $data->id }}" value="{{ old('password') }}" placeholder="Isi untuk ubah kata sandi">
                  <div class="input-group-append">
                    <div class="input-group-text" onclick="togglePasswordVisibility('password-{{ $data->id }}','passwordicon-{{ $data->id }}')">
                      <i class="fas fa-eye" id="passwordicon-{{ $data->id }}"></i>
                    </div>
                  </div>
                  @error('password')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label>Alamat</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address', $data->address) }}">
                @error('address')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label>Foto</label>
                <div class="custom-file">
                  <label class="custom-file-label" for="customFile">Unggah gambar untuk ubah foto</label>
                  <input type="file" id="photo" name="photo" class="custom-file-input upload-photo" id="customFile">
                </div>
              </div>
            </div>
        </div>
        <div class="card-footer text-right">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection
