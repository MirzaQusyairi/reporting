<div class="modal fade modal-review" id="modal-review-{{ $dt->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Review Pelaporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('report.review') }}" method="POST">
        @method('PUT')
				@csrf
				<input type="hidden" name="id" value="{{ $dt->id }}">

        <div class="modal-body">
          <div class="form-group">
            <label for="info">Keterangan</label>
            <textarea class="form-control" name="info" id="info" style="height: unset">{{ $dt->info }}</textarea>
            @error('info')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
              <option value="return" @if (old('status', $dt->status) == 'return') selected @endif>Kembalikan</option>
              <option value="accept" @if (old('status', $dt->status) == 'accept') selected @endif>Terima</option>
            </select>
            @error('status')
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