<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function login(Request $request) {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'device_name' => ['required'],
    	]);
        
        $user = User::where('email', $request->email)->first();

	    if (! $user) {
	        throw ValidationException::withMessages([
	            'email' => ['Account with this email was not found, please contact NIIT Enugu for help.'],
	        ]);
	    } else if ( ! Hash::check($request->password, $user->password) ) {
            throw ValidationException::withMessages([
                'password' => ['Incorrect password input!'],
            ]);
        }

	    return $user->createToken($request->device_name)->plainTextToken;
    }

    public function logout(Request $request) {

    	// Revoke the user's current token...
		$request->user()->currentAccessToken()->delete();
		return response()->json(['Message' => 'Bye!']);

    }
}
