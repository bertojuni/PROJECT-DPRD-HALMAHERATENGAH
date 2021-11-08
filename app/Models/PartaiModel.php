<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartaiModel extends Model
{
    use HasFactory;
    protected $table = 'partai';
    protected $primaryKey = 'partai_id';

    
}
