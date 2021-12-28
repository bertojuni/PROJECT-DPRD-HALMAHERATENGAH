<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;
    protected $table = 'city';
    protected $primaryKey = 'city_id';

    protected $fillable = ['city_id', 'province_id', 'province', 'type', 'city_name', 'created_at', 'updated_at', 'deleted_at'];
}
