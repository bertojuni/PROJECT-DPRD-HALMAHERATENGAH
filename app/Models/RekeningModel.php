<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningModel extends Model
{
    use HasFactory;
    protected $table = 'rekening';
    protected $primaryKey = 'rek_id';

    protected $fillable = ['rek_id', 'rek_no', 'rek_nama', 'rek_bank', 'rek_desc', 'created_at', 'updated_at', 'deleted_at'];
}
