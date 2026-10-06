<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

// Laporan dibangun dengan Query Builder (DB::table)
class RekapController extends Controller
{
    public function index()
    {
        $rekapProdi = DB::table('mahasiswas')
            ->select('prodi', DB::raw('count(*) as jumlah'), DB::raw('avg(semester) as rata_semester'))
            ->groupBy('prodi')
            ->get();

        $rekapNilai = DB::table('nilai_matakuliahs')
            ->join('mahasiswas', 'nilai_matakuliahs.mahasiswa_id', '=', 'mahasiswas.id')
            ->join('matakuliahs', 'nilai_matakuliahs.matakuliah_id', '=', 'matakuliahs.id')
            ->select('matakuliahs.nama as matakuliah', DB::raw('count(*) as peserta'), DB::raw('avg(nilai_matakuliahs.nilai) as rata_nilai'))
            ->groupBy('matakuliahs.nama')
            ->orderByDesc('rata_nilai')
            ->limit(10)
            ->get();

        $totalSks = DB::table('matakuliahs')->sum('sks');

        return view('laporan.rekap', compact('rekapProdi', 'rekapNilai', 'totalSks'));
    }
}
