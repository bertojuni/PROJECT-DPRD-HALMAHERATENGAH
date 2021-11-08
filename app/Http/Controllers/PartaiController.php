<?php

namespace App\Http\Controllers;

use App\Models\PartaiModel;
use Illuminate\Http\Request;

class PartaiController extends Controller
{
    //
    public function index() {
        $data = [
            'title' => 'Data Partai',
            'partai' => PartaiModel::get()
        ];

        return view('partai.index', $data);
    }
}
