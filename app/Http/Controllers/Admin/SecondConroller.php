<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SecondConroller extends Controller
{
    public function show() {
        return 'static string';
    }
}
