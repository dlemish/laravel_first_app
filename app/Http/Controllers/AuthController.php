<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController{
    
    // Register new user
    public function register(Request $request){

        try{

            $valid = $request -> validate([
                'family'     => 'required|max:50',
                'first_name' => 'required|max:50',
                'patronymic' => 'nullable|max:50',
                'email'      => 'required|email|unique:user|max:100',
                'login'      => 'required|unique:user|max:50',
                'password'   => 'required|min:8|max:16'
            ]);

            $user = User::create($valid);
            
            return [
                "success" => true,
                "message" => null,
                "data" => [
                    "redirect" => "/user/forms/registration/complete"
                ]
            ];

        } catch(ValidationException $e){
            return [
                "success" => false,
                "message" => preg_replace('/\s*\(and \d+ more errors?\)\s*/', '', $e -> getMessage()),
                "data"    => null
            ];
        } catch(Throwable $e){
            return [
                "success" => false,
                "message" => preg_replace('/\s*\(and \d+ more errors?\)\s*/', '', $e -> getMessage()),
                "data"    => null
            ];
        }

    }

    // Authenticate user
    public function authenticate(Request $request){

        try{

            $valid = $request -> validate([
                'login'    => 'required',
                'password' => 'required'
            ]);

            $by_email = [
                'email'    => $valid['login'],
                'password' => $valid['password']
            ];

            $by_login = [
                'login' => $valid['login'],
                'password' => $valid['password']
            ];

            $remember = isset($request -> input()["remember"]) ? true : false;

            if(Auth::attempt($by_email, $remember) || Auth::attempt($by_login, $remember)){
                
                $request -> session() -> regenerate();
                return [
                    'success' => true,
                    'message' => null,
                    'data' => [
                        'redirect' => '/'
                    ]
                ];

            } else return [
                "success" => false,
                "message" => "Введены неверные учетные данные",
                "data" => ""
            ];

        } catch(ValidationException $e){
            return [
                "success" => false,
                "message" => preg_replace('/\s*\(and \d+ more errors?\)\s*/', '', $e -> getMessage()),
                "data"    => null
            ];
        } catch(Throwable $e){
            return [
                "success" => false,
                "message" => preg_replace('/\s*\(and \d+ more errors?\)\s*/', '', $e -> getMessage()),
                "data"    => null
            ];
        }

    }

}
