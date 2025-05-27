<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Cari</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="tahun">Tahun</label>
                            <select class="form-select" id="tahun" wire:model="tahun" wire:change='search' required>
                                <option value="{{ now()->year-1 }}">{{ now()->year-1 }}</option>
                                <option value="{{ now()->year }}">{{ now()->year }}</option>
                                <option value="{{ now()->year+1 }}">{{ now()->year+1 }}</option>
                          </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
          <div class="card-header flex-column flex-md-row">
            <div class="head-label text-left"><h5 class="card-title mb-0">Hari Libur</h5></div>
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" type="button" data-bs-toggle="modal" data-bs-target="#modal_import">
                        <span><i class="ri-add-line"></i>
                            <span class="d-none d-sm-inline-block">Import</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $no = 1;
                @endphp
                @foreach ($hari_libur as $item)

                <tr class="table-default">
                    <td>{{ $no++}}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="ri-more-2-line"></i>
                            </button>
                            <div class="dropdown-menu">
                              {{-- <a class="dropdown-item" href="javascript:void(0);" wire:click="edit({{ $item['id'] }})"><i class="ri-pencil-line me-1"></i> Edit</a>
                              <a class="dropdown-item" href="javascript:void(0);" wire:click="deleteConfirmation({{ $item['id'] }})"><i class="ri-delete-bin-6-line me-1"></i> Delete</a>
                              <a class="dropdown-item" href="{{ route('permission_role', $item['id']) }}" wire:navigate><i class="ri-key-fill me-1"></i> Set Permission</a> --}}
                            </div>
                          </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $hari_libur->links() }}
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal_import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <form wire:submit.prevent="import">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Hari Libur</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-label" for="file">File*</label>
                                    <input type="file" id="file" name="file" class="form-control" wire:model.defer='file'/>
                                    @error('file')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            // console.log('berhasil');
            document.addEventListener('livewire:initialized', () => {
                @this.on('swal', (event) => {
                    const data = event;
                    Swal.fire({
                        icon    : data[0]['icon'],
                        title   : data[0]['title'],
                        text    : data[0]['text']
                    });
                });
            });

            document.addEventListener('livewire:initialized', () => {
                @this.on('close-modal', (event) => {
                    const data = event;
                    $('#modal_import').modal('hide');
                });
            });

             document.addEventListener('livewire:initialized', () => {
                @this.on('show-modal', (event) => {
                    const data = event;
                    $('#modal_import').modal('show');
                });
            });

            document.addEventListener('livewire:initialized', () => {
                @this.on('confirm-delete', (event) => {
                    const data = event;
                    Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#aaa',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('deleteConfirmed');
                    }
                });
                });
            });
        </script>
</div>
