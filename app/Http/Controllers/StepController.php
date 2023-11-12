<?php

namespace App\Http\Controllers;

use App\Models\Step;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\UserStep;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class StepController extends Controller
{
    public function step(Request $request, Step $step): RedirectResponse|Response
    {
        if ($request->user()->steps()->where('step_id', $step->id)->first()) {
            if ($step?->nextStep) {
                return \Redirect::action([self::class, 'step'], ['step' => $step?->nextStep]);
            }

            return \Redirect::action([self::class, 'completed']);
        }

        return Inertia::render('Step', [
            'currentStep' => $step,
            'allSteps'    => Step::all(),
        ]);
    }

    public function store(Request $request, Step $step): RedirectResponse
    {
        $request->validate([
            'value' => ['required'],
        ]);

        UserStep::create([
            'user_id' => $request->user()?->id,
            'step_id' => $step->id,
            'value'   => $request->get('value'),
            'content' => [],
        ]);

        if ($step?->nextStep) {
            return \Redirect::action([self::class, 'step'], ['step' => $step?->nextStep]);
        }

        return \Redirect::action([self::class, 'completed']);
    }

    public function firstToComplete(Request $request): RedirectResponse
    {
        $user = $request->user();

        /** @var UserStep|null $lastStep */
        $lastStep = $user->steps->last();

        if ($nextStep = $lastStep?->step->nextStep) {
            return \Redirect::action([self::class, 'step'], ['step' => $nextStep]);
        }

        if ($user->steps()->count() <= 0) {
            $step = Step::first();

            return \Redirect::action([self::class, 'step'], ['step' => $step]);
        }

        return \Redirect::action([self::class, 'completed']);
    }

    public function completed(): Response
    {

        return Inertia::render('StepCompleted');

    }
}
