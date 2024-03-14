<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    function index() {
        return view('specialties.index');
    }
}
