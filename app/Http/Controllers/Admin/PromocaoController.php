<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class PromocaoController extends Controller
{
    public function create()
    {
        return view('admin.promocoes.create');
    }
}
