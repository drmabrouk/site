<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use App\Models\Employer;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'employers' => Employer::count(),
            'jobs' => Job::count(),
            'applications' => Application::count(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    public function users()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users', compact('users'));
    }

    public function jobs()
    {
        $jobs = Job::with('employer')->latest()->paginate(20);
        return view('admin.jobs', compact('jobs'));
    }
}
