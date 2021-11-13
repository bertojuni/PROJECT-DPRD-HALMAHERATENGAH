<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;
    
    protected $table = 'anggota';
    protected $primaryKey = 'anggota_id';
    protected $fillable = ['anggota_id', 'anggota_nama', 'anggota_jabatan', 'anggota_tempatlhr', 'anggota_tgllhr', 'partai_id', 'anggota_pasangan', 'anggota_pekerjaan', 'anggota_pasangan', 'anggota_pekerjaan', 'anggota_alamat', 'anggota_nohp', 'anggota_email', 'anggota_anak', 'anggota_ktp', 'anggota_npwp', 'anggota_bpjs', 'created_at', 'updated_at'];

    public function getAllAnggota() {
        $data = AnggotaModel::join('partai', 'partai.partai_id', 'anggota.partai_id')
                    ->select('anggota.*', 'partai.partai_nama')
                    ->get();
        
        return $data;
    }
}
