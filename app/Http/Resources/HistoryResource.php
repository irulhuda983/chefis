<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class HistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->user->profil->nama,
            'nrp' => $this->user->profil->nrp,
            'foto' => $this->user->profil->foto,
            'tipe' => $this->tipe,
            'waktu' => Carbon::createFromFormat('Y-m-d H:i:s', $this->waktu)->diffForHumans(),
            'keterangan' => $this->keterangan
        ];
    }
}
