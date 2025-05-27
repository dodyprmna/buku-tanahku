<?php

namespace App\Livewire\Peminjaman;

use App\Models\PeminjamanBukuTanah;
use App\Models\PengembalianBukuTanah;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    public $search = '';
    public $status = '';
    public $selectedUser ='';
    public $user;
    public $id_peminjaman;
    protected $listeners = ['approvalConfirmed' => 'approval', 'deleteConfirmed' => 'delete'];


    public function mount() {
        $this->user = User::all();
    }

    public function render()
    {
        $query = PeminjamanBukuTanah::with('peminjam', 'kelurahan', 'kelurahan.kecamatan','peruntukan');

        // jika admin
        if (Auth::user()->hasRole("Admin")) {
            if ($this->status !== '') {
                $query->where('status', $this->status);
            }

            if ($this->selectedUser !== '') {
                $query->where('peminjam_id', $this->selectedUser);
            }
            $data = [
                'peminjaman'    => $query->get()->map(function($item) {
                    $dueDate = Carbon::parse($item->duedate_pengembalian);
                    $item->selisih_hari = now()->diffInDays($dueDate, false); // false: bisa hasil negatif jika terlambat
                    return $item;
                })
            ];

            return view('livewire.peminjaman.index_admin', $data)->title('Peminjaman Buku Tanah');
        }else{
            $data = [
                'peminjaman'    => PeminjamanBukuTanah::with('peminjam', 'kelurahan', 'kelurahan.kecamatan','peruntukan')->where('peminjam_id',Auth::user()->id)->get()->map(function($item) {
                    $dueDate = Carbon::parse($item->duedate_pengembalian);
                    $item->selisih_hari = now()->diffInDays($dueDate, false); // false: bisa hasil negatif jika terlambat
                    return $item;
                })
            ];
            return view('livewire.peminjaman.index', $data)->title('Peminjaman Buku Tanah');
        }
    }

    function approvalConfirmation($id) {
        $this->id_peminjaman = $id;
        $this->dispatch('confirm-approval');
    }

    function deleteConfirmation($id) {
        $this->id_peminjaman = $id;
        $this->dispatch('confirm-delete');
    }

    public function approval() {
        $duedate = $this->getDueDatePengembalian();
        $peminjaman = PeminjamanBukuTanah::find($this->id_peminjaman);

        $peminjaman->tanggal_pinjam = Carbon::now('Asia/Jakarta');
        $peminjaman->duedate_pengembalian = $duedate;
        $peminjaman->status = 1;
        $peminjaman->save();

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text'  => 'Data berhasil disetujui!',
            'icon'  => 'success',
        ]);
    }

    public function delete() {
        $delete = PeminjamanBukuTanah::findOrFail($this->id_peminjaman)->delete();
        if (!$delete) {
            $this->dispatch('swal', [
                'title' => 'Gagal!',
                'text'  => 'Data gagal dihapus!',
                'icon'  => 'error',
            ]);
            return;
        }

        $this->dispatch('swal', [
            'title' => 'Berhasil!',
            'text'  => 'Data berhasil dihapus!',
            'icon'  => 'success',
        ]);
    }

    function getDueDatePengembalian($days = 5) {
        $holidays = DB::table('hari_liburs')->pluck('tanggal')->map(fn($date) => Carbon::parse($date)->toDateString())->toArray();
        $start = Carbon::now('Asia/Jakarta');
        $workingDays = 0;

        while ($workingDays < $days) {
            $start->addDay();

            // Skip if it's weekend or a holiday
            if ($start->isWeekday() && !in_array($start->toDateString(), $holidays)) {
                $workingDays++;
            }
        }
        return $start->toDateString();
    }

    function searchByUser() {
        $this->selectedUser;
    }

    function searchByStatus() {
        $this->status;
    }

    public function pengembalian($id) {
        $peminjaman = PeminjamanBukuTanah::find($id);

        $pengembalian = PengembalianBukuTanah::create([
            'peminjaman_id'         => $peminjaman->id,
            'tanggal_pengembalian'  => Carbon::now('Asia/Jakarta')
        ]);
        if ($pengembalian) {
            $peminjaman->status = 2;
            $peminjaman->save();
        }

        $this->dispatch('swal', [
            'title' => 'Yeay!',
            'text'  => 'Terima kasih sudah bersedia mengembalikan',
            'icon'  => 'success',
        ]);
    }
}
