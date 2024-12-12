<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlugueisController extends Controller
{
    public function index()
    {
        return view('site.aluguel.index');
    }

}
