<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class climberController extends Controller
{
    public function index()
    {
        return view('climber');
    }
}
