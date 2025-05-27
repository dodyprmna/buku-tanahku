<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-3">
            <div class="card-header">
                <h3>Tambah Data</h3>
            </div>
            <div class="card-body">
                <form wire:submit = {{ $editingId === null ? "store" : "update" }}>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="namaUser">Nama User*</label>
                            <input type="text" name="name" id="namaUser" class="form-control" placeholder="Nama User" required wire:model="name"/>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="nip">NIP*</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan NIP" required wire:model="username"/>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="role">Role*</label>
                            <select class="form-control" name="role" id="role" wire:model="role">
                                <option value="">- Pilih Role -</option>
                                @foreach ($roles as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit" style="width: 100%">
                            {{ $editingId === null ? 'Submit' : 'Update' }}
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="card">
          <div class="card-header flex-column flex-md-row">
            <div class="head-label text-left"><h5 class="card-title mb-0">Role</h5></div>
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <button wire:click="resetForm" class="btn btn-secondary create-new btn-primary waves-effect waves-light" type="button">
                        <span><i class="ri-add-line"></i>
                            <span class="d-none d-sm-inline-block">Tambah Data</span>
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
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $no = 1;
                @endphp
                @foreach ($users as $item)

                <tr class="table-default">
                    <td>{{ $no++}}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->roles->first()->name ?? '-' }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="ri-more-2-line"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:void(0);" wire:click="edit({{ $item['id'] }})"><i class="ri-pencil-line me-1"></i> Edit</a>
                              <a class="dropdown-item" href="javascript:void(0);" wire:click="deleteConfirmation({{ $item['id'] }})"><i class="ri-delete-bin-6-line me-1"></i> Delete</a>
                            </div>
                          </div>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $users->links() }}
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
