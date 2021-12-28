<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinceModel extends Model
{
    use HasFactory;
    protected $table = 'province';
    protected $primaryKey = 'province_id';

    protected $fillable = ['province_id', 'province', 'created_at', 'updated_at', 'deleted_at'];
}
