<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPPDModel extends Model
{
    use HasFactory;
    protected $table = 'sppd';
    protected $primaryKey = 'sppd_id';

    protected $fillable = ['sppd_id', 'sppd_no', 'sppd_des', 'sppd_asal', 'sppd_tujuan_prov', 'sppd_tujuan_city', 'sppd_tujuan_sudis', 'sppd_waktu', 'sppd_berangkat', 'sppd_kembali', 'sppd_jenis', 'sppd_rek', 'sppd_tgl', 'created_at', 'updated_at'];

}
