<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Job $job): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return $user->isEmployer();
    }

    public function update(User $user, Job $job): bool
    {
        return $user->isEmployer() && $job->employer_id === $user->employer->id;
    }

    public function delete(User $user, Job $job): bool
    {
        return $user->isEmployer() && $job->employer_id === $user->employer->id;
    }
}
