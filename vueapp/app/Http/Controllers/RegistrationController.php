<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
//use Mail;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Log;

use DateTime;
use DateInterval;

use App\Mail\welcome;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
	//spa register method
	public function register(Request $request) {
		$request->validate([
			'name' => 'required',
			'email' => 'required|email|unique:App\Models\User',
			'password' => 'required|confirmed'
		]);
		
		Mail::to($request->email)->send(new welcome('Welcome to rpg game!'));
			
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => $request->password //hashed in user model
		]);
		return ['token' => $user->createToken('user-access-token',['server:access'])->plainTextToken, 'message' => 'registration successful'];
	}
}