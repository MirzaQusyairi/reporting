@extends('layouts.admin-layout')

@section('page_name', 'Ubah Pelaporan')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <form action="/report/{{ $report->id }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card-body">
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Pengeluaran</label>
            <div class="col-sm-12 col-md-7">
              <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id">
                <option hidden value="">Pilih Jenis Pengeluaran</option>
                  @foreach ($datatypeexpense as $item)
                    <option value="{{ $item->id }}" {{$item->id == $report->type_id?'selected':''}}>{{ $item->type }}</option>
                  @endforeach
              </select>
              @error('type_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div>
              <a class="btn-guide btn btn-warning" data-toggle="modal" data-target="#modal-guide"><i class="fas fa-info"></i> Lihat Panduan</a>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Detail Pengeluaran</label>
            <div class="col-sm-12 col-md-7">
              <textarea class="form-control @error('detail') is-invalid @enderror" id="detail" name="detail" style="height: unset">{{$report->detail}}</textarea>
              @error('detail')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bukti SPJ / Pengeluaran</label>
            <div class="col-sm-12 col-md-7">
              <div class="mt-1 mb-3" style="list-style-type: auto;">
                @foreach ($report->evidence as $item)
                  <li><a href="{{ asset('storage/'.str_replace('public/', '', $item->filepath)) }}" target="_blank">{{ $item->filename }}</a></li>
                @endforeach
              </div>
              <div class="custom-file">
                <label class="custom-file-label @error('evidence') is-invalid @enderror" for="customFile">Ubah file</label>
                <input type="file" id="evidence" name="evidence[]" class="custom-file-input @error('evidence') is-invalid @enderror" id="customFile" multiple>
                @error('evidence')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                <label for="" class="text-warning mx-1 my-1"><i class="fas fa-exclamation-triangle"></i> Unggah ulang semua dokumen jika ingin mengubah Bukti SPJ/ Pengeluaran</label>
                <div id="fileList"></div>
              </div>
            </div>
          </div>
         
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary">Ajukan Ulang</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade modal-guide" id="modal-guide">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Panduan Pelaporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
          <iframe src="{{ asset('assets/doc/PANDUAN-BUKTI-SPJ-PENGELUARAN.pdf') }}" width="100%" height="400"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection