<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $temuans = Temuan::all();
            return response()->json($temuans, 200);
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
                'equipment_type' => 'required',
                'finding' => 'required',
                'gambar' => 'required|array',
                'gambars.*' => 'nullable|mimes:png,jpg,jpeg,webp|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 400);
            }
            
            $temuan = new Temuan();
            $temuan->lokasi_feeder = $request->input('lokasi_feeder');
            $temuan->no_pole = $request->input('no_pole');
            $temuan->equipment_type = $request->input('equipment_type');
            $temuan->finding = $request->input('finding');

            if ($request->hasFile('gambar')) {
                $images = $request->file('gambar');
                $imageNames = [];

                foreach ($images as $image) {
                    $imageName = time(). '.'. $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/temuans'), $imageName);
                    $imageNames[] = $imageName;
                }

                $temuan->gambar = json_encode($imageNames);
            }

            $temuan->save();

            return response()->json(['message' => 'Finding created successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $find_data = Temuan::find($id);
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
        $temuan = Temuan::find($id);
        $temuan->update($request->all());

        return $temuan;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $temuan = Temuan::destroy($id);

            if (!$temuan) {
                return response()->json(['message' => 'Data tidak ditemukan.'], 404);
            }

            return response()->json(['message' => 'Data berhasil dihapus!'], 200);
        } catch (\Throwable $th) {
            Log::error('Error occured: '. $th->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}
