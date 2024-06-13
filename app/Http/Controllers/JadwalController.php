<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $jadwals = Jadwal::all();
            return response()->json($jadwals, 200);
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
            'awal_pemeriksaan' => 'required',
            'batas_pemeriksaan' => 'required',
            'lokasi_feeder' => 'required',
            'status' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }
            
            $awal_pemeriksaan = $request->input('awal_pemeriksaan');
            $batas_pemeriksaan = $request->input('batas_pemeriksaan');
            $lokasi_feeder = $request->input('lokasi_feeder');
            $status = $request->input('status');
    
            $jadwal = Jadwal::create([
                'awal_pemeriksaan' => $awal_pemeriksaan,
                'batas_pemeriksaan' => $batas_pemeriksaan,
                'lokasi_feeder' => $lokasi_feeder,
                'status' => $status
            ]);
            
            $response_data = [
                'message' => 'Data Jadwal dan Lokasi Pemeriksaan berhasil dibuat!',
                'data' => $jadwal
            ];

            return response()->json($response_data, 201);
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
            $find_data = Jadwal::find($id);
            return response()->json($find_data, 200);
        } catch (\Throwable $th) {
            Log::error('Error occurred: '. $th->getMessage());

            if ($th instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return response()->json(['message' => 'Data tidak ditemukan!'], 404);
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
        $jadwal = Jadwal::find($id);
        $jadwal->update($request->all());

        return $jadwal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $jadwal = Jadwal::destroy($id);
            
            if (!$jadwal) {
                return response()->json(['message' => 'Data tidak ditemukan.'], 404);
            }
    
            return response()->json(['message' => 'Data berhasil dihapus!'], 200);
        } catch (\Throwable $th) {
            Log::error('Error occurred: '. $th->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}
