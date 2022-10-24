<?php

namespace App\Http\Controllers\layout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function index()
    {
        return view('page.form');
    }
}
