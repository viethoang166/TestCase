<?php

namespace App\Http\Controllers\layout;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index()
    {
        return view('page.compare');
    }
}
