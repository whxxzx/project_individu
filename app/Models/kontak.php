<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'jenis_kontak_id',
        'deskripsi'
    ];
    protected $table = 'jenis_kontak_siswa';

    public function siswa(){
        return $this->belongsTo('App\Models\siswa','id');
    }

    public function jenis_kontak(){
        return $this->belongsTo('App\Models\jenis_kontak','jenis_kontak_id');
    }
}
