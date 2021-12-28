<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubdistrictModel extends Model
{
    use HasFactory;
    protected $table = 'subdistrict';
    protected $primaryKey = 'subdistrict_id';

    protected $fillable = ['subdistrict_id', 'province_id', 'province', 'city_id', 'city', 'type', 'subdistrict_name', 'created_at', 'updated_at', 'deleted_at'];
}
