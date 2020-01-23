<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $request) 
    {

        return view('admin.config');
    }

    public function info() 
    {

    }

    public function permissoes() 
    {

    }
}
