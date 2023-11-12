<?php

namespace App\Http\Controllers;

use Str;
use Inertia\Inertia;
use App\Models\User;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class TeamController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('TeamsIndex');
    }

    public function create(Request $request)
    {
        $user = $request->user();
        $team = $user->team;

        if ($team->users->count() >= 3) {
            return back()->with(['message' => 'Already have reached the maximum of users']);
        }

        return Inertia::render('TeamsCreate');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required'],
            'email'    => ['required', 'email', 'unique:users,email'],
        ]);

        $user = $request->user();
        $team = $user->team;

        if ($team->users()->count() > 3) {
            throw new ValidationException('Already have reached the maximum of users');
        }

        $user           = new User();
        $user->name     = $request->get('username');
        $user->email    = $request->get('email');
        $user->password = Hash::make(Str::random(10));
        $user->team()->associate($team);
        $user->save();

        $token = Password::createToken($user);
        $user->sendConfirmAccountNotification($token);

        return \Redirect::action([self::class, 'index']);
    }
}
