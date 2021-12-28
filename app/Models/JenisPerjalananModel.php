<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPerjalananModel extends Model
{
    use HasFactory;
    protected $table = 'jenis_perjalanan';
    protected $primaryKey = 'jp_id';

    protected $fillable = ['jp_id', 'jp_nama', 'created_at', 'updated_at', 'deleted_at'];
}
