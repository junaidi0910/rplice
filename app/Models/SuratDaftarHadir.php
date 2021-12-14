<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratDaftarHadir extends Model
{
    use HasFactory;

    protected $table = 'surat_daftar_hadir';

    protected $guarded = [];

    public function sign()
    {
        return $this->belongsTo(Sign::class, 'sign_id', 'id');
    }
}
