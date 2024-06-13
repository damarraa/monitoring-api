<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pemeriksaans = Pemeriksaan::all();
            return response()->json($pemeriksaans, 200);
        } catch (\Throwable $th) {
            Log::error('Error occurred: '. $th->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan dalam mengambil data'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'lokasi_feeder' => 'required',
                'no_pole' => 'required',
                'kondisi_no_pole' => 'required',
                'level_hca' => 'required',
                'koordinat_north' => 'required',
                'koordinat_east' => 'required',
                'tipe_tiang' => 'required',
                'kondisi_bagian_atas' => 'required',
                'kondisi_bagian_bawah' => 'required',
                'kondisi_cross_arm' => 'required',
                'kondisi_guy_pole' => 'required',
                'kondisi_tanah' => 'required',
                'kemiringan_tanah' => 'required',
                'tiang_sleeve' => 'required',
                'peralatan_tiang' => 'required',
                'kondisi_tiang' => 'required',
                'serial_number_tiang' => 'required',
                'kapasitas_tiang' => 'required',
                'tipe_pin_insulator' => 'required',
                'kondisi_pin_insulator' => 'required',
                'kondisi_dead_end_insulator' => 'required',
                'jumlah_dead_end_insulator' => 'required',
                'kondisi_suspension_insulator' => 'required',
                'jumlah_suspension_insulator' => 'required',
                'tipe_lightning_arrester' => 'required',
                'kondisi_lightning_arrester' => 'required',
                'kondisi_kawat_guy' => 'required',
                'jumlah_kawat_guy' => 'required',
                'kondisi_static_wire' => 'required',
                'kondisi_fiber_optic' => 'required',
                'kondisi_pole_guard' => 'required',
                'jumlah_pole_guard' => 'required',
                'tipe_tumbuhan' => 'required',
                'tinggi_tumbuhan' => 'required',
                'jumlah_tumbuhan' => 'required',
                'tipe_lec' => 'required',
                'jumlah_lec' => 'required',
                'akses_pekerja' => 'required',
                'akses_kendaraan_besar' => 'required',
                'akses_kendaraan_kecil' => 'required',
                'kondisi_stiker_peringatan' => 'required',
                'kondisi_papan_peringatan_publik' => 'required',
                'jumlah_papan_peringatan_publik' => 'required',
                'kondisi_papan_peringatan_bahaya' => 'required',
                'jumlah_papan_peringatan_bahaya' => 'required',
                'kondisi_kawat_duri' => 'required',
                'aktifitas_konduktor' => 'required',
                'tipe_konduktor' => 'required',
                'keterangan' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            
        } catch (\Throwable $th) {
            Log::error('Error occurred: '. $th->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan dalam memproses permintaan.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $find_data = Pemeriksaan::find($id);
            return response()->json($find_data, 200);
        } catch (\Throwable $th) {
            Log::error('Error occurred: '. $th->getMessage());

            if ($th instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['message' => 'Data tidak ditemukan!'], 400);
            }

            return response()->json(['message' => 'Terjadi kesalahan saat menampilkan data.'], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemeriksaan = Pemeriksaan::find($id);
        $pemeriksaan->update($request->all());

        return $pemeriksaan;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pemeriksaan = Pemeriksaan::destroy($id);

            if (!$pemeriksaan) {
                return response()->json(['message' => 'Data tidak ditemukan.'], 404);
            }

            return response()->json(['message' => 'Data berhasil dihapus!'], 200);
        } catch (\Throwable $th) {
            Log::error('Error occured: '. $th->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}
