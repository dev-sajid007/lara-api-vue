<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\password;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(LoginRequest $request)
    {
        // $user = User::where('email', $request->email)->first();

        // if (!$user || !Hash::check($request->password, $user->password)) {

        //     throw ValidationException::withMessages([
        //         'email' => ['The Credentials You Entered Is Incorrect!']
        //     ]);

        // }

        if (!auth()->attempt($request->only(['email','password']))) {

            throw ValidationException::withMessages([
                'email' => ['The Credentials You Entered Is Incorrect!']
            ]);
            
        }
    }
}
