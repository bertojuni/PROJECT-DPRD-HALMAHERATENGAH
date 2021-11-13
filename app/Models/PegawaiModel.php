<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'pg_id';
    protected $fillable = ['pg_id', 'pg_nama', 'pg_jabatan', 'pg_tempatlhr', 'pg_gol', 'pg_status', 'pg_tgllhr', 'pg_nip', 'pg_status', 'pg_pasangan', 'pg_anak', 'pg_pasangan', 'pg_pekerjaan', 'pg_alamat', 'pg_nohp', 'pg_email', 'pg_pendidikan', 'pg_kontak', 'pg_ktp', 'pg_npwp', 'pg_karpeg', 'pg_bpjs', 'created_at', 'updated_at'];

}
