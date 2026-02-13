<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('jobs.index');
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        // Handle job posting logic
        return redirect()->route('jobs.index')->with('success', 'Job posted successfully!');
    }
}
