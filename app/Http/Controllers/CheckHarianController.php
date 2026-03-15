<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckHarian;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Pastikan Carbon di-import

class CheckHarianController extends Controller
{
    // Menampilkan halaman informasi pasien (output_pasien)
    public function index()
    {
        // 1. Dapatkan data user yang sedang login
        $user = Auth::user();

        // 2. Ambil semua data check harian milik user, diurutkan dari yang terbaru
        $checkHarians = $user->checkHarians()->orderBy('tanggal', 'desc')->get();

        // 3. Lakukan perhitungan untuk statistik
        $totalUniqueDays = $checkHarians->pluck('tanggal')->unique()->count();
        $compliantDays = $checkHarians->where('minum_obat', 'Ya')->count();
        $totalTreatmentDuration = 33; // Durasi total pengobatan dalam hari

        // Hitung persentase kepatuhan berdasarkan hari unik yang diisi
        $compliancePercentage = ($totalTreatmentDuration > 0)
            ? ($totalUniqueDays / $totalTreatmentDuration) * 100
            : 0;
            
        // Jika sudah mengisi penuh, pastikan persentase 100%
        if ($totalUniqueDays >= $totalTreatmentDuration) {
            $compliancePercentage = 100;
        }

        // Hitung umur pasien
        $age = Carbon::parse($user->birth_date)->age;

        // Buat data dinamis lainnya
        $rekamMedis = 'RM' . str_pad($user->id, 3, '0', STR_PAD_LEFT);
        
        // Tentukan jadwal kontrol berikutnya (33 hari setelah input pertama jika ada)
        $jadwalKontrol = 'Belum Tersedia';
        if ($checkHarians->isNotEmpty()) {
            $tanggalPertama = $checkHarians->min('tanggal');
            $jadwalKontrol = Carbon::parse($tanggalPertama)->addDays($totalTreatmentDuration)->format('d F Y');
        }

        // 4. Kirim semua data yang dibutuhkan ke view 'output_pasien'
        return view('output_pasien', [
            'user' => $user,
            'checkHarian' => $checkHarians, // Ganti nama variabel agar konsisten
            'age' => $age,
            'rekamMedis' => $rekamMedis,
            'totalUniqueDays' => $totalUniqueDays,
            'compliantDays' => $compliantDays,
            'totalTreatmentDuration' => $totalTreatmentDuration,
            'compliancePercentage' => $compliancePercentage,
            'jadwalKontrol' => $jadwalKontrol,
        ]);
    }

    // Menampilkan form untuk mengisi data check harian
    public function create()
    {
        return view('checkharian'); // Mengarahkan ke form
    }

    // Menyimpan data check harian ke database
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'suhu' => 'required|numeric',
            'berat' => 'required|numeric',
            'nafsu_makan' => 'required|string|in:Baik,Normal,Menurun',
            'minum_obat' => 'required|string|in:Ya,Tidak',
            'catatan_pete' => 'required|string',
        ]);

        CheckHarian::create([
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'suhu' => $request->suhu,
            'berat' => $request->berat,
            'nafsu_makan' => $request->nafsu_makan,
            'minum_obat' => $request->minum_obat,
            'catatan_pete' => $request->catatan_pete,
        ]);

        return redirect()->route('checkharian')->with('success', 'Data check harian berhasil disimpan.');
    }
}