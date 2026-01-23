<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController{
    
    // Register new user
    public function register(Request $request): RedirectResponse{

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
            return redirect() -> route('user.forms.registration.complete');

        } // Validation error
        catch(ValidationException $e){
            return redirect() -> route('user.forms.registration', [
                'error' => preg_replace('/\s*\(and \d+ more errors?\)\s*/', '', $e -> getMessage()),
                'prev_family' => $request['family'],
                'prev_first_name' => $request['first_name'],
                'prev_patronymic' => $request['patronymic'],
                'prev_email' => $request['email'],
                'prev_login' => $request['login']
            ]);
        } // Other errors 
        catch(Throwable $e){
            return redirect() -> route('user.forms.registration', [
                'error' => preg_replace('/\s*\(and \d+ more errors?\)\s*/', '', $e -> getMessage()),
                'prev_family' => $request['family'],
                'prev_first_name' => $request['first_name'],
                'prev_patronymic' => $request['patronymic'],
                'prev_email' => $request['email'],
                'prev_login' => $request['login']
            ]);
        }

    }

    // Authenticate user
    public function authenticate(Request $request): RedirectResponse{

        try{

            $valid = $request -> validate([
                'login'    => 'required',
                'password' => 'required'
            ]);

            // Auth by login or email
            if(Auth::attempt(['login' => $valid['login'], 'password' => $valid['password']]) || 
               Auth::attempt(['email' => $valid['login'], 'password' => $valid['password']])){

                $request -> session() -> regenerate();
                return redirect() -> route('user.forms.master');

            } else return redirect() -> route('user.forms.authentication', ['error' => 'Указаны неверные данные учетной записи']);

        } // Validation error
        catch(ValidationException $e){
            return redirect() -> route('user.forms.authentication', [
                'error' => preg_replace('/\s*\(and \d+ more errors?\)\s*/', '', $e -> getMessage()),
            ]);
        } // Other errors 
        catch(Throwable $e){
            return redirect() -> route('user.forms.authentication', [
                'error' => preg_replace('/\s*\(and \d+ more errors?\)\s*/', '', $e -> getMessage()),
            ]);
        }

    }

    // Logout user
    public function logout(Request $request): RedirectResponse{

        if(Auth::check()){
            Auth::logout();
            $request -> session() -> invalidate();
            $request -> session() -> regenerateToken();
            return redirect() -> route('user.forms.authentication');
        } else return redirect() -> intended() -> route('user.forms.master');

    }

}
