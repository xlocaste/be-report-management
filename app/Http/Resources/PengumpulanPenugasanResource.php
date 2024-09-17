<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PengumpulanPenugasanResource extends JsonResource
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
            'penugasan_id' => $this -> penugasan_id,
            'link_google_drive' => $this -> link_google_drive,
            'user_id' => $this -> user_id,
            'catatan' => $this -> catatan,
            'status' => $this -> status,
            'created_at' => $this -> created_at,
            'updated_at' => $this -> updated_at,

            'penugasan' => new PenugasanResource($this->whenLoaded('penugasan')),
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
