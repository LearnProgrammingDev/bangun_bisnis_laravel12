<?php

namespace App\Models;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tugas';

    protected $fillable = ['title', 'description', 'assigned_to', 'tanggal_selesai', 'status'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'assigned_to');
    }
}
