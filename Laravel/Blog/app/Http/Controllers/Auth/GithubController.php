<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    // function to redirect to GitHub for authentication
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    // handleGithubCallback
    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();
        // check if the user already exists in the database
        $user = User::where('email', $githubUser->getEmail())->first();
        if (!$user) {
            // if the user does not exist, create a new user
            $user = User::create([
                'name' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                'password' => bcrypt(str_random(16)),
                'github_id' => $githubUser->getId(),
            ]);
            Auth::login($user);
            return redirect()->route('home')->with('success', 'You have successfully registered and logged in with GitHub.');

        }
    }
}
