<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPPDDocumentModel extends Model
{
    use HasFactory;
    protected $table = 'sppd_document';
    protected $primaryKey = 'id_sppd_doc';

    protected $fillable = ['id_sppd_doc', 'id_sppd', 'path', 'type', 'title', 'created_at', 'updated_at'];
}
