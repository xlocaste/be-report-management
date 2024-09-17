<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengumpulanPenugasanStoreRequest;
use App\Http\Requests\PengumpulanPenugasanUpdateRequest;
use App\Http\Resources\PengumpulanPenugasanResource;
use App\Models\PengumpulanPenugasan;

class PengumpulanPenugasanController extends Controller
{
    public function index()
    {
        $daftarPengumpulanPenugasan = PengumpulanPenugasan::with('penugasan', 'user')->get();

        return PengumpulanPenugasanResource::collection($daftarPengumpulanPenugasan);
    }

    public function store(PengumpulanPenugasanStoreRequest $request)
    {
        $pengumpulanPenugasan = PengumpulanPenugasan::create([
            'penugasan_id'=>$request->penugasan_id,
            'link_google_drive'=>$request->link_google_drive,
            'user_id'=>$request->user_id,
            'catatan'=>$request->catatan,
            'status'=>$request->status,
        ]);

        return (new PengumpulanPenugasanResource($pengumpulanPenugasan))->additional([
            'message' => 'Data Berhasil di Tambahkan'
        ]);
    }

    public function update(PengumpulanPenugasanUpdateRequest $request, PengumpulanPenugasan $pengumpulanPenugasan)
    {
        $pengumpulanPenugasan->update([
            'penugasan_id'=>$request->penugasan_id,
            'link_google_drive'=>$request->link_google_drive,
            'user_id'=>$request->user_id,
            'catatan'=>$request->catatan,
            'status'=>$request->status,
        ]);

        return (new PengumpulanPenugasanResource($pengumpulanPenugasan))->additional([
            'message' => 'Data Berhasil di Edit'
        ]);
    }

    public function show($pengumpulanPenugasan)
    {
        $pengumpulanPenugasan = PengumpulanPenugasan::findOrFail($pengumpulanPenugasan);

        return (new PengumpulanPenugasanResource($pengumpulanPenugasan))->additional([
            'message' => 'Data Berhasil di Ambil'
        ]);
    }
}
