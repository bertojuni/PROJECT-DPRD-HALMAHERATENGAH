<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPTDocumentModel extends Model
{
    use HasFactory;
    protected $table = 'spt_document';
    protected $primaryKey = 'id_spt_doc';

    protected $fillable = ['id_spt_doc', 'id_sppd', 'path', 'type', 'title', 'created_at', 'updated_at'];
}
