<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasukModel extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $primaryKey = 'sm_id';

    protected $fillable = ['sm_id', 'sm_asal', 'sm_no', 'sm_perihal', 'sm_tgl', 'sm_masuk', 'sm_tujuan', 'sm_penerima', 'sm_desc', 'created_at', 'updated_at'];

}
