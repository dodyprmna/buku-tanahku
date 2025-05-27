<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header flex-column flex-md-row">
            <h5 class="card-title mb-0">Form Edit Peminjaman</h5>
        </div>
        {{-- select2 --}}
        @push('styles')
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-5-theme/1.5.2/select2-bootstrap-5-theme.min.css">
        @endpush
        {{-- end select2 --}}
        <div class="card-body">
            <form wire:submit = 'update'>
            {{-- <input type="text" wire:model="editingIndex"> --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label" for="jenishak">Jenis Hak*</label>
                        <select class="form-select select2" id="jenishak" wire:model="selectedJenisHak" required>
                            <option value="" selected hidden>- Pilih Jenis Hak -</option>
                                @foreach ($jenisHak as $hak)
                                    <option value="{{ $hak}}">{{ $hak}}</option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label" for="keperluan">Peruntukan*</label>
                        <select class="form-select select2" id="keperluan" wire:model="selectedPeruntukan" required>
                            <option value="" selected hidden>- Pilih Peruntukan -</option>
                                @foreach ($peruntukans as $peruntukan)
                                    <option value="{{ $peruntukan->id}}">{{ $peruntukan->peruntukan}}</option>
                                @endforeach
                          </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label" for="nomorhak">Nomor Hak*</label>
                        <input type="text" id="nomorhak" class="form-control" placeholder="Nomor Hak" required wire:model="nomorHak"/>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label class="form-label" for="nomorsu">Nomor SU</label>
                        <input type="text" id="nomorsu" class="form-control" placeholder="Nomor SU" wire:model="nomorSU"/>
                    </div>
                </div>
                <div class="col-md-6 mb-3" >
                    <div class="form-group">
                        <label class="form-label" for="kecamatan">Kecamatan*</label>
                        <select class="form-select select2" id="kecamatan" wire:model="selectedKecamatan" wire:change="getKelurahan" required>
                            <option value="" selected hidden>- Pilih Kecamatan -</option>
                            @foreach ($kecamatans as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3" >
                    <div class="form-group">
                        <label class="form-label" for="kelurahan">Kelurahan / Desa*</label>
                        <select class="form-select select2" id="kelurahan" wire:model="selectedKelurahan" required>
                            <option value="" selected hidden required>- Pilih Kelurahan / Desa -</option>
                                @foreach ($kelurahans as $kel)
                                    <option value="{{ $kel->id }}">{{ $kel->nama_kelurahan }}</option>
                                @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
            </div>
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
                }).then(() => {
                // Pindah halaman dengan wire:navigate
                    window.Livewire.navigate('/peminjaman');
                });
            });
        });
    </script>
    {{-- @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>

            function initSelect2() {
                $('.select2').select2({
                    theme: 'bootstrap-5'
                });

                $('#kecamatan').on('change', function () {
                    Livewire.dispatch('getKelurahan',$(this).val());
                });
            }

            document.addEventListener('livewire:initialized', function () {
                // console.log('Livewire initialized, Select2 diinisialisasi pertama kali.');
                initSelect2(); // Inisialisasi Select2 pertama kali
            });

            Livewire.hook('message.processed', (message, component) => {
                console.log('Livewire message processed, Select2 di-reinitialize.');
                initSelect2(); // Inisialisasi ulang Select2 setelah render Livewire
            });
        </script>
    @endpush --}}
</div>
