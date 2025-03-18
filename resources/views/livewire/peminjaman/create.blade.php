<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header flex-column flex-md-row">
            <h5 class="card-title mb-0">Form Peminjaman</h5>
        </div>
        <div class="card-body">
            <form wire:submit = "getKelurahan">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label" for="nomorhak">Nomor Hak*</label>
                        <input type="text" id="nomorhak" class="form-control" placeholder="Nomor Hak" required wire:model="nomorHak"/>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label" for="nomorsu">Nomor SU</label>
                        <input type="text" id="nomorsu" class="form-control" placeholder="Nomor SU"/>
                    </div>
                </div>
                <div class="col-md-6 mb-3" >
                    <div class="form-group">
                        <label class="form-label" for="kecamatan">Kecamatan</label>
                        <select class="form-select" id="kecamatan" wire:model="selectedKecamatan" wire:change="getKelurahan()">
                            <option value="" selected hidden>- Pilih Kecamatan -</option>
                                @foreach ($kecamatans as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3" >
                    <div class="form-group">
                        <label class="form-label" for="kelurahan">Kelurahan / Desa</label>
                        <select class="form-select" id="kelurahan" wire:model="selectedKelurahan">
                            <option value="" elected hidden>- Pilih Kelurahan / Desa -</option>
                                @foreach ($kelurahans as $kel)
                                    <option value="{{ $kel->id }}">{{ $kel->nama_kelurahan }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit">Test</button>
            </form>
            </div>

        </div>
    </div>
    <div class="card mt-2">
        <div class="card-header flex-column flex-md-row">
            <h5 class="card-title mb-0">Item Peminjaman</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive table-stripped ">
                <table class="table table-responsive">
                    <tr>
                        <th>#</th>
                        <th>Nomor Hak</th>
                        <th>Jenis Hak</th>
                        <th>Nomor SU</th>
                        <th>Kel/Desa</th>
                        <th>Kecamatan</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ($bukuTanah as $index => $bt)
                        <th>{{ $index+1 }}</th>
                        <th></th>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
