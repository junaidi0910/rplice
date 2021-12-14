<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'surats_users');
    }

    public function sign()
    {
        return $this->belongsTo(Sign::class);
    }
}
