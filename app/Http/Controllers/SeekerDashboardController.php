<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use Barryvdh\DomPDF\Facade\Pdf;

class SeekerDashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $applications = $user->applications()->with('job.employer')->latest()->take(5)->get();

        // Simple profile completion metric
        $completion = 0;
        if ($user->avatar) $completion += 20;
        if ($user->experiences()->exists()) $completion += 40;
        if ($user->certifications()->exists()) $completion += 20;
        if ($user->location) $completion += 20;

        return view('seeker.dashboard', compact('user', 'applications', 'completion'));
    }

    public function profile(Request $request)
    {
        $user = $request->user()->load(['experiences', 'certifications']);
        return view('seeker.profile', compact('user'));
    }

    public function downloadPortfolio(Request $request)
    {
        $user = $request->user()->load(['experiences', 'certifications']);
        $pdf = Pdf::loadView('pdf.portfolio', compact('user'));
        return $pdf->download('portfolio.pdf');
    }
}
