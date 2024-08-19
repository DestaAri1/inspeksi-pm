<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function ErrorRoute() {
        return view('error.404');
    }
}
