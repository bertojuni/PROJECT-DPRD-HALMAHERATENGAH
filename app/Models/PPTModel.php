<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPTModel extends Model
{
    use HasFactory;
    protected $table = 'ppt';
    protected $primaryKey = 'ppt_id';

    protected $fillable = ['ppt_id', 'ppt_nama', 'ppt_pendidikan', 'ppt_tempatlhr', 'ppt_tgllhr', 'ppt_alamat', 'ppt_nohp', 'ppt_ktp', 'ppt_bagian'];

}
