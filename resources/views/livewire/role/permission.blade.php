<div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header">
                <h3>Pengaturan Hak Akses</h3>
            </div>
            <div class="card-body">
                <form wire:submit = {{ count($selectedPermission) === 0 ? 'store' : 'update' }}>
                <div class="row">
                    <div class="col-md p-6">
                    @foreach ($groupedPermissions as $module => $actions)
                        <div class="mb-3">
                            <large class="text-light fw-medium">{{ $module }}</large>
                            @foreach ($actions as $action)
                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $action }}" id="{{ Str::slug($action)}}" wire:model="selectedPermission"/>
                                    <label class="form-check-label" for="{{ Str::slug($action)}}"> {{ $action }} </label>
                                </div>
                                {{-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="{{ $action }}" id="{{ Str::slug($action) }}">
                                    <label class="form-check-label" for="{{ Str::slug($action) }}">
                                        {{ $action }}
                                    </label>
                                </div> --}}
                            @endforeach
                        </div>
                    @endforeach
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit" style="width: 100%">
                            {{ count($selectedPermission) === 0 ? 'Submit' : 'Update' }}
                        </button>
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
