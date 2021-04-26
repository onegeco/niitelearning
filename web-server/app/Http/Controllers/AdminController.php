<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\RoleUser;

class AdminController extends Controller
{
    public function getLecturers(Request $request) {
        $lecturers = RoleUser::where('role_id', '1')->select('user_id')->get();
        $user = User::with(['role'])->get();
    /*    foreach($user as $key) {
            $roles = $key->role;
            while($roles->role_id == '1') {
             //   return response()->json($key->email);
            }    
            return response()->json($key->email);          
        }*/
        foreach($lecturers as $key) {
            return response()->json($key->user_id);
        }
        //

        /*while($lecturers) {
            return response()->json($lecturers->user_id);
        }
        foreach($lecturers as $key) {
            $user = User::with(['role'])->where('id', $key->user_id);
            return response()->json($key->user_id);
        } */
       // $user = User::with(['role'])->where('role_id', '3')->get();
    }
}