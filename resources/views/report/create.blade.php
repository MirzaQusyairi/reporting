@extends('layouts.admin-layout')

@section('page_name', 'Input Pelaporan')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card">
      <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Pengeluaran</label>
            <div class="col-sm-12 col-md-7">
              <select class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id">
                <option hidden value="">Pilih Jenis Pengeluaran</option>
                  @foreach ($type_expenses as $item)
                    <option value="{{ $item->id }}" @if(old('type_id') == $item->id) selected @endif>{{ $item->type }}</option>
                  @endforeach
              </select>
              @error('type_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-guide"><i class="fas fa-info"></i> Lihat Panduan</button>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Detail Pengeluaran</label>
            <div class="col-sm-12 col-md-7">
              <textarea class="form-control" id="detail" name="detail" style="height: unset"></textarea>
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
              <div class="custom-file">
                <label class="custom-file-label @error('evidence') is-invalid @enderror" for="customFile">Pilih file</label>
                <input type="file" id="evidence" name="evidence[]" class="custom-file-input @error('evidence') is-invalid @enderror" id="customFile" multiple>
                @error('evidence')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
                <div id="fileList"></div>
              </div>
            </div>
          </div>
         
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button type="submit" class="btn btn-primary">Simpan</button>
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

@endsection