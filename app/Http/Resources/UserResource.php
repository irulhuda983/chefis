<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'username' => $this->username,
            'role_id' => $this->role_id,
            'is_active' => $this->is_active,
            'nama' => $this->profil->nama,
            'nrp' => $this->profil->nrp,
            'id_kesatuan' => $this->profil->id_kesatuan,
            'id_jabatan' => $this->profil->id_jabatan,
            'id_pangkat' => $this->profil->id_pangkat,
            'foto' => optional($this->profil)->foto ? url('api/upload/' . optional($this->profil)->foto) : null,
        ];
    }
}
