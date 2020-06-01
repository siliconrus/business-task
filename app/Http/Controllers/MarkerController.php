<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marker;

class MarkerController extends Controller
{
    public function index()
    {
        $markers = Marker::all();

        return view('home', compact('markers'));
    }
}
