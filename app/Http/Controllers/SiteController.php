<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $veiculos = Veiculo::all();
        return view('site.site', compact('veiculos'));
    }
}
