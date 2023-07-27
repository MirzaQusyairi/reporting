<div class="modal fade" id="modal-create-user" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body modal-create-user">
          <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}">
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Kata Sandi</label>
            <div class="input-group">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}">
              <div class="input-group-append">
                <div class="input-group-text" onclick="togglePasswordVisibility('password','passwordicon')">
                  <i class="fas fa-eye" id="passwordicon"></i>
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
            <label for="employee_id">No Pegawai</label>
            <input type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" id="employee_id" value="{{ old('employee_id') }}">
            @error('employee_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="position">Jabatan</label>
            <input type="text" class="form-control @error('position') is-invalid @enderror" name="position" id="position" value="{{ old('position') }}">
            @error('position')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="phone">Telepon</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}">
            @error('phone')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address') }}">
            @error('address')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label >Foto</label>
            <div class="custom-file">
              <label class="custom-file-label" for="customFile">Pilih gambar</label>
              <input type="file" id="photo" name="photo" class="custom-file-input" id="customFile">
            </div>
          </div>
          <div class="form-group">
            <label for="role">Tipe Pengguna</label>
            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
              <option value="">Pilih Tipe Pengguna</option>
              <option value="administrator">Sekretariat</option>
              <option value="user">Anggota</option>
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