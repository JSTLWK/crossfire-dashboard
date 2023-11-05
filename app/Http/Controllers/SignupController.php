<?php

namespace App\Http\Controllers;


use Hash;
use App\Models\User;
use App\Models\TournamentTeam;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Password;

class SignupController extends Controller
{
    public function __invoke(SignupRequest $request)
    {

        $user           = new User();
        $user->name     = $request->get('username');
        $user->email    = $request->get('email');
        $user->password = Hash::make(\Str::random(10));
        $user->save();

        $token = Password::createToken($user);
        $user->sendConfirmAccountNotification($token);

        $team       = new TournamentTeam();
        $team->name = $request->get('teamName');
        $team->save();

    }
}
