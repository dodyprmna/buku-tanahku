<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- Modal --}}
        <div class="modal fade" id="modalForm" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-6 mt-2">
                      <div class="form-floating form-floating-outline">
                        <input type="text" id="nameLarge" class="form-control" placeholder="Enter Name">
                        <label for="nameLarge">Name</label>
                      </div>
                    </div>
                  </div>
                  <div class="row g-4">
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="email" id="emailLarge" class="form-control" placeholder="xxxx@xxx.xx">
                        <label for="emailLarge">Email</label>
                      </div>
                    </div>
                    <div class="col mb-2">
                      <div class="form-floating form-floating-outline">
                        <input type="date" id="dobLarge" class="form-control">
                        <label for="dobLarge">DOB</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        {{-- End Modal --}}
        {{-- <div class="content-backdrop fade"></div> --}}
        <div class="card">
          <div class="card-header flex-column flex-md-row">
            <div class="head-label text-left"><h5 class="card-title mb-0">Peminjaman Buku Tanah</h5></div>
            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                <div class="dt-buttons btn-group flex-wrap">
                    <button class="btn btn-secondary create-new btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#largetModal" type="button">
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
                  <th>Desa/Kelurahan</th>
                  <th>Kecamatan</th>
                  <th>No. Hak</th>
                  <th>No. SU</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal Harus Kembali</th>
                  <th>Peminjam</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <tr class="table-default">
                    <td>1</td>
                    <td>Magetan</td>
                    <td>Magetan</td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="d-flex flex-column">
                                <small class="emp_post text-truncate">Hak Milik</small>
                                <span class="emp_name text-truncate h6 mb-0">149</span>
                            </div>
                        </div>
                    </td>
                  <td></td>
                  <td>2 Februari 2025</td>
                  <td>5 Februari 2025</td>
                  <td>
                    <ul class="list-unstyled m-0 avatar-group d-flex align-items-center">
                      <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        class="avatar avatar-xs pull-up"
                        title="Lilian Fuller">
                        <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                      </li>
                      <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        class="avatar avatar-xs pull-up"
                        title="Sophia Wilkerson">
                        <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle" />
                      </li>
                      <li
                        data-bs-toggle="tooltip"
                        data-popup="tooltip-custom"
                        data-bs-placement="top"
                        class="avatar avatar-xs pull-up"
                        title="Christina Parker">
                        <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle" />
                      </li>
                    </ul>
                  </td>
                  <td>Sidang Pengadilan</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ri-more-2-line"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-line me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-6-line me-1"></i> Delete</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="ri-check-fill me-1"></i> Pengembalian</a>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
</div>
