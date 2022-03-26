<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    use HasFactory;
    protected $table = 'setting';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'setting_name', 'setting_value', 'created_at', 'updated_at', 'deleted_at'];

}
