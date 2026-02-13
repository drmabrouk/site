<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SeekerDashboardController;
use App\Http\Controllers\EmployerDashboardController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/policies', [PageController::class, 'policies'])->name('policies');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/post', [JobController::class, 'create'])->name('jobs.create');
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

Route::get('/dashboard', function (Illuminate\Http\Request $request) {
    if ($request->user()->isAdmin()) return redirect()->route('admin.dashboard');
    if ($request->user()->isEmployer()) return redirect()->route('employer.dashboard');
    return redirect()->route('seeker.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Seeker Routes
    Route::get('/seeker', [SeekerDashboardController::class, 'index'])->name('seeker.dashboard');
    Route::get('/seeker/profile', [SeekerDashboardController::class, 'profile'])->name('seeker.profile');
    Route::get('/seeker/portfolio/download', [SeekerDashboardController::class, 'downloadPortfolio'])->name('seeker.portfolio.download');

    // Employer Routes
    Route::get('/employer', [EmployerDashboardController::class, 'index'])->name('employer.dashboard');
    Route::get('/employer/jobs/{job}/manage', [EmployerDashboardController::class, 'manageJob'])->name('employer.jobs.manage');
    Route::get('/employer/candidates', [EmployerDashboardController::class, 'searchCandidates'])->name('employer.candidates');

    // Admin Routes
    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/users', [AdminDashboardController::class, 'users'])->name('admin.users');
        Route::get('/admin/jobs', [AdminDashboardController::class, 'jobs'])->name('admin.jobs');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
