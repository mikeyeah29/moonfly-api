<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index() {
    	dd('docs');
    }
}
