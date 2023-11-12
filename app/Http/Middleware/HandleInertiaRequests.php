<?php

namespace App\Http\Middleware;

use App\Models\Step;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $allStepsCount = Step::count();
        $currentSteps  = 0;
        $teamMembers   = [];

        if ($user = $request->user()) {
            $currentSteps = $user->steps()->count();

            $teamMembers = $request->user()->team->users;
        }

        return array_merge(parent::share($request), [
            'currentActiveSteps' => $allStepsCount - $currentSteps,
            'teamMembers'        => $teamMembers,
        ]);
    }
}
