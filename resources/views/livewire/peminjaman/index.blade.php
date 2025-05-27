<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
          <div class="card-header flex-column flex-md-row">
            <div class="head-label text-left"><h5 class="card-title mb-0">Peminjaman Buku Tanah</h5></div>
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <a href="/peminjaman/create" wire:navigate class="btn btn-secondary create-new btn-primary waves-effect waves-light" type="button">
                        <span><i class="ri-add-line"></i>
                            <span class="d-none d-sm-inline-block">Tambah Data</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Desa/Kelurahan</th>
                  <th>No. Hak</th>
                  <th>No. SU</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Harus Kembali</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @php
                    $no = 1;
                @endphp
                @foreach ($peminjaman as $item)

                @php
                    $background ='';
                    if ($item->status == '1' &&$item->selisih_hari <= 0) {
                        $table = 'table-danger';
                    } elseif($item->status == '1' && $item->selisih_hari <= 3) {
                        $table = 'table-warning';
                    } else{
                        $table = 'table-default';
                    }

                @endphp
                <tr class="{{ $table }}">
                    <td>{{ $no++ }}</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="d-flex flex-column">
                                <small class="emp_post text-truncate">Des. {{ $item->kelurahan->nama_kelurahan }}</small>
                                <small class="emp_post text-truncate">Kec. {{ $item->kelurahan->kecamatan->nama_kecamatan }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="d-flex flex-column">
                                <small class="emp_post text-truncate">{{ $item->jenis_hak }}</small>
                                <span class="emp_name text-truncate h6 mb-0">{{ $item->nomor_hak }}</span>
                            </div>
                        </div>
                    </td>
                  <td>{{ $item['nomor_su'] }}</td>
                  <td>{{ $item->tanggal_pinjam ? \Carbon\Carbon::parse($item->tanggal_pinjam)->translatedFormat('d F Y') : "-"}}</td>
                  <td>{{ $item->duedate_pengembalian ? \Carbon\Carbon::parse($item->duedate_pengembalian)->translatedFormat('d F Y') : "-" }}</td>
                  <td>{{ $item->peruntukan->peruntukan }}</td>
                  <td>
                    @if ($item->status == "0")
                        <span class="badge rounded-pill bg-warning text-dark">Menunggu Persetujuan</span>
                    @elseif ($item->status == "1")
                        <span class="badge rounded-pill bg-success">Disetujui</span>
                    @else
                        <span class="badge rounded-pill bg-primary">Selesai</span>
                    @endif
                  </td>
                  <td>
                    @if ($item->status == 0)
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ri-more-2-line"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('peminjaman.edit', $item->id) }}"><i class="ri-pencil-line me-1" wire:navigate></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);" wire:click="deleteConfirmation({{ $item->id }})"><i class="ri-delete-bin-6-line me-1"></i> Delete</a>
                      </div>
                    </div>
                    @elseif ($item->status == 1)
                        <a class="dropdown-item" href="javascript:void(0);" wire:click='pengembalian({{ $item->id }})'><i class="ri-check-fill me-1"></i> Selesai</a>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
