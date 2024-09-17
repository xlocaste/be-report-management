<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PenugasanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this -> id,
            'nama_laporan' => $this -> nama_laporan,
            'code' => $this -> code,
            'deadline' => $this -> deadline,
            'keterangan' => $this -> keterangan,
        ];
    }
}
