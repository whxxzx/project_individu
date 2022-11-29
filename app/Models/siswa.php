<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nama',
        'alamat',
        'jk',
        'foto',
        'about'
    ];
    protected $table = 'siswa';

    public function kontak (){
        return $this->belongsToMany('App\models\jenis_kontak')->withPivot('deskripsi','id');
    }
    public function project (){
        return $this->hasMany('App\models\project','id_siswa');
    }
    // public function jenis_kontak (){
    //     return $this->hasMany('app\models\jenis_kontak','id_siswa');
    // }
}
