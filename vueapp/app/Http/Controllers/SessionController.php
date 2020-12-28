<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
//use Illuminate\Support\Str;
//use Carbon\Carbon;
//use Mail;

use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Log;

use DateTime;
use DateInterval;

//use App\Mail\welcome;
use Illuminate\Support\Facades\Mail;

class SessionController extends Controller
{
	//spa login method
	public function login(Request $request) {
		
		$request->validate([
			'email' => 'required|email',
			'password' => 'required'
		]);

		$user = User::where('email', $request->email)->first();
		if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'message' => ['Your login details are incorrect.'],
            ]);
        }
		else {
			$user->tokens()->delete();
			$token = $user->createToken('user-access-token',['server:access']);
			//return ['token' => $token->plainTextToken];
			return ['token' => $token];
		}
	}
	
	//spa logout method
	public function logout(Request $request) {
		$user = User::where('id', Auth::id())->first();
		$user->tokens()->delete();
		Auth::logout();
	}
	
	public function checkAccess(Request $request) {
		$data = $request->token;
		return response()->json([
			//'data' => $data
			'data' => $request->user()
		], 200);
	}
}