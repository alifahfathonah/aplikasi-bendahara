<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $table='tb_siswa';
    protected $fillable = ['nm_siswa','kelas'];
    public $timestamps = false;
}
