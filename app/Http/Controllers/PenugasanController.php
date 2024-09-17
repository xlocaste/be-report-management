<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenugasanStoreRequest;
use App\Http\Requests\PenugasanUpdateRequest;
use App\Http\Resources\PenugasanResource;
use App\Models\Penugasan;

class PenugasanController extends Controller
{
    public function index()
    {
        $daftarPenugasan = Penugasan::get();

        return PenugasanResource::collection($daftarPenugasan);
    }

    public function store(PenugasanStoreRequest $request)
    {
        $penugasan = Penugasan::create([
            'nama_laporan'=>$request->nama_laporan,
            'code'=>$request->code,
            'deadline'=>$request->deadline,
            'keterangan'=>$request->keterangan,
        ]);

        return (new PenugasanResource($penugasan))->additional([
            'message' => 'Data Berhasil di Tambahkan'
        ]);
    }

    public function update(PenugasanUpdateRequest $request, Penugasan $penugasan)
    {
        $penugasan->update([
            'nama_laporan'=>$request->nama_laporan,
            'code'=>$request->code,
            'deadline'=>$request->deadline,
            'keterangan'=>$request->keterangan,
        ]);

        return (new PenugasanResource($penugasan))->additional([
            'message' => 'Data Berhasil di Edit'
        ]);
    }

    public function show($penugasan)
    {
        $penugasan = Penugasan::findOrFail($penugasan);

        return (new PenugasanResource($penugasan))->additional([
            'message' => 'Data Berhasil di Ambil'
        ]);
    }

    public function destroy(Penugasan $penugasan)
    {
        $penugasan->delete();

        return response()->json([
            'message' => 'Data Berhasil di Hapus'
        ]);
    }
}
