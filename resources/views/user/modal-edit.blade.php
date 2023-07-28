<div class="modal fade modal-edit-user" id="modal-edit-user-{{ $dt->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
				@csrf
				<input type="hidden" name="id" value="{{ $dt->id }}">
        <div class="modal-body modal-create-user">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $dt->name) }}">
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $dt->email) }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="employee_id">No Pegawai</label>
            <input type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id" value="{{ old('employee_id', $dt->employee_id) }}">
            @error('employee_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="position">Jabatan</label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" id="position" value="{{ old('position', $dt->position) }}">
            @error('position')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="phone">Telepon</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone', $dt->phone) }}">
            @error('phone')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address', $dt->address) }}">
            @error('address')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label >Foto</label>
            <div>
              @if($dt->photo)
                <img src="{{ asset('storage/'.str_replace('public/', '', $dt->photo)) }}" class="img-fluid mb-3 col-sm-5">
              @else
                <h6 class="text-warning">Belum ada foto</h6>
              @endif
            </div>
            <div class="custom-file">
              <label class="custom-file-label" for="customFile">Unggah gambar untuk ubah foto</label>
              <input type="file" id="photo" name="photo" class="custom-file-input upload-photo" id="customFile">
            </div>
          </div>
          <div class="form-group">
            <label for="password">Ubah Kata Sandi</label>
            <div class="input-group">
              <input type="password" class="form-control password @error('password') is-invalid @enderror" name="password" id="password-{{ $dt->id }}" value="{{ old('password') }}" placeholder="Isi untuk ubah kata sandi">
              <div class="input-group-append">
                <div class="input-group-text" onclick="togglePasswordVisibility('password-{{ $dt->id }}','passwordicon-{{ $dt->id }}')">
                  <i class="fas fa-eye" id="passwordicon-{{ $dt->id }}"></i>
                </div>
              </div>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <label for="role">Tipe Pengguna</label>
            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
              <option value="administrator" @if (old('role', $dt->role) == 'administrator') selected @endif>Sekretariat</option>
              <option value="user" @if (old('role', $dt->role) == 'user') selected @endif>Anggota</option>
            </select>
            @error('role')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>