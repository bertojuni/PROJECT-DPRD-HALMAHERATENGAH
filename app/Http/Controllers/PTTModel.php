<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class PTTModel extends Model
{
    //
    protected $table = 'ppt';
    protected $primaryKey = 'ppt_id';

    protected $fillable = ['ppt_id', 'ppt_nama', 'ppt_pendidikan', 'ppt_tempatlhr', 'ppt_tgllhr', 'ppt_alamat', 'ppt_nohp', 'ppt_ktp', 'ppt_bagian'];

}
