<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\RoleUser;

class AuthController extends Controller
{
    public function user(Request $request) {

        $userRole = RoleUser::where('user_id', Auth::user()->id)->get();

        foreach ($userRole as $key) {
            $role = $key->role_id;
            return response()->json([
                'id' => Auth::user()->id,
                'first_name' => Auth::user()->f_name,
                'last_name' => Auth::user()->l_name,
                'middle_name' => Auth::user()->m_name,
                'email' => Auth::user()->email,
                'type' => $role,
                'mobile' => Auth::user()->mobile,
                'course' => Auth::user()->reg_course,
            ]);
        }
	}

    public function handleClientAuth(Request $request) {
        $user = RoleUser::where('user_id', Auth::user()->id)->get();

        foreach($user as $key) {
            $role = $key->role_id;

            if($role == $request->ut) {
                return response()->json(['Authenticated'], 200);
            } else{
                return response()->json(['Invalid Access'], 404);
            }
        }
    }
}
