<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class prodicontroller extends Controller
{
    public function index(){
        $kampus = "Universitas MDP";
        return view("prodi.index")->with('KAMPUS', $kampus);
    }
}
