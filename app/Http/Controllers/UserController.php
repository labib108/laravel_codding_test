<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    function LoginPage():View{
        return view('pages.login.login');
    }
    function RegisterPage():View{
        return view('pages.login.register');
    }

    function UserLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        $count=User::where('email','=',$request->input('email'))
            ->where('password','=',$request->input('password'))
            ->select('id')->first();

        if($count!==null){
            $email = $request->input('email');
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successful',
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized login'
            ],200);

        }
    }
    function Register(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'User registered successfully',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'created_at' => $user->created_at,
            ],
        ], 201); 
    }


    function LogOut(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        return redirect('/');
    }
}