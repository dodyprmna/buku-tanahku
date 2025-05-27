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
                            <label class="form-label" for="nomorhak">Nama Permission*</label>
                            <input type="text" id="namaPermission" class="form-control" placeholder="Nama Permission" required wire:model="permissionName"/>
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
            <div class="head-label text-left"><h5 class="card-title mb-0">Permission</h5></div>
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
                  <th>Guard</th>
                  <th>Permission</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $no = 1;
                @endphp
                @foreach ($permission as $item)

                <tr class="table-default">
                    <td>{{ $no++}}</td>
                    <td>{{ $item['guard_name'] }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" wire:click="edit({{ $item['id'] }})"><i class="ri-pencil-line me-1"></i>Edit</a>
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
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
        </script>
</div>
