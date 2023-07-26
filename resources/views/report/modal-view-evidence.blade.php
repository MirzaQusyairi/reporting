<div class="modal fade modal-view-evidence" id="modal-view-evidence-{{ $dt->id}}">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Bukti SPJ / Pengeluaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">File</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dt->evidence as $index => $item)
                <tr>
                  <th>{{ $index+1 }}</th>
                  <td>
                    <a href="{{ asset('storage/'.str_replace('public/', '', $item->filepath)) }}" target="_blank">{{ $item->filename }}</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  </div>
</div>