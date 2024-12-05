<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartBaseController extends BaseController
{
    public function columnChart()
    {
        return view('chart/columnChart');
    }

    public function lineChart()
    {
        return view('chart/lineChart');
    }

    public function pieChart()
    {
        return view('chart/pieChart');
    }
}