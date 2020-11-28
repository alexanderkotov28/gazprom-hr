<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Requirement;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        return view('admin.positions.index');
    }

    public function add()
    {
        $requirements = Requirement::with('options')->get();
        return view('admin.positions.form', compact('requirements'));
    }
    
    public function edit()
    {
        
    }

    public function create(Request $request)
    {
        dd($request->all());
    }

    public function update()
    {
        
    }
}