<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    use HttpResponses;

    public function index(){
        return response()->json('This is the Login Form page');
    }

    public function login(LoginUserRequest $request){

        $request->validated($request->all());

        if(!Auth::attempt($request->only('email', 'password'))){
                return $this->error('', 
            'The user cant be authenticated', 401);
        }

        $user = User::where('email', $request->email)->first();
        return $this->success(
            [
                'data' => $user,
                'token' => $user->createToken('API token for '. $user->name)->plainTextToken,
            ],
            'User authenticated Successfully',
            200
        );
    }

    public function register(StoreUserRequest $request){

        $request->validated($request->all);
            
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken,
        ]);
    }

    public function logout(){
        return "This is the logout page";
    }

}