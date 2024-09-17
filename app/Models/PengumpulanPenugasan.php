<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumpulanPenugasan extends Model
{
    use HasFactory;

    protected $table = 'pengumpulan_penugasan';

    protected $fillable = [
        'penugasan_id',
        'link_google_drive',
        'user_id',
        'catatan',
        'status',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Penugasan()
    {
        return $this->belongsTo(Penugasan::class);
    }
}
