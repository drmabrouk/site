<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EmployerDashboardController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $employer = $request->user()->employer;
        $jobs = $employer->jobs()->withCount('applications')->latest()->get();
        return view('employer.dashboard', compact('employer', 'jobs'));
    }

    public function manageJob(Job $job)
    {
        $this->authorize('update', $job);
        $applications = $job->applications()->with('seeker')->latest()->get();
        return view('employer.manage-job', compact('job', 'applications'));
    }

    public function searchCandidates(Request $request)
    {
        $query = User::where('role', 'seeker');

        if ($request->has('q')) {
            $query->where('name', 'like', '%' . $request->q . '%')
                  ->orWhere('username', 'like', '%' . $request->q . '%');
        }

        $candidates = $query->paginate(10);
        return view('employer.search-candidates', compact('candidates'));
    }
}
