<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    
    

    public function create_sppd_document() {
        // return "oke";
        return view('sppd/doc/sppdcreate');
    }
}
