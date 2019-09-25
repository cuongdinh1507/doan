<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function createDashboard(){
        return view('admin.dashboard');
    }

    public function createCharts(){
        return view('admin.charts');
    }

    public function createTables(){
        return view('admin.tables');
    }
}
