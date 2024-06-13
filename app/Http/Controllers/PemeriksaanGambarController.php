<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\PemeriksaanGambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PemeriksaanGambarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $pemeriksaan_id)
    {
        try {
            $pemeriksaan = Pemeriksaan::find($pemeriksaan_id);
            $pemeriksaan_gambar = PemeriksaanGambar::where('pemeriksaan_id', $pemeriksaan_id)->get();
            return response()->json([$pemeriksaan, $pemeriksaan_gambar], 200);
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
    public function store(Request $request, int $pemeriksaan_id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'foto_findings.*' => 'nullable|mimes:png,jpg,jpeg,webp'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }

            $pemeriksaan = Pemeriksaan::find($pemeriksaan_id);
            
            $foto_findingData = [];
            if ($files = $request->file('foto_findings')) {
                foreach ($files as $file) {
                    $extension = $files->getClientOriginalExtension();
                    $filename = time().'.'.$extension;
                    $path = "uploads/foto_findings/";
                    $file->move($path, $filename);

                    $foto_findingData[] = [
                        'pemeriksaan_id' => $pemeriksaan->pemeriksaan_id,
                        'foto_finding' => $path.$filename
                    ];
                }
            }
    
            $pemeriksaan_gambar = PemeriksaanGambar::create($foto_findingData);
            
            $response_data = [
                'message' => 'Foto Finding berhasil ditambahkan!',
                'data' => $pemeriksaan_gambar
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $pgambar_id)
    {
        try {
            $pemeriksaan_gambar = PemeriksaanGambar::find($pgambar_id);
            
            if (File::exists($pemeriksaan_gambar->foto_finding)) {
                File::delete($pemeriksaan_gambar->foto_finding);
            }
            $pemeriksaan_gambar->delete();

            if (!$pemeriksaan_gambar) {
                return response()->json(['message' => 'Data tidak ditemukan.'], 404);
            }

            return response()->json(['message' => 'Data berhasil dihapus!'], 200);
        } catch (\Throwable $th) {
            Log::error('Error occured: '. $th->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}
