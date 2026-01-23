<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AccountController{
    
    // Update user account
    public function update(Request $request){
        
        try{

            $valid = $request -> validate([
                'family' => 'required|max:50',
                'first_name' => 'required|max:50',
                'patronymic' => 'nullable|max:50',
                'email' => [
                    'required',
                    'email',
                    'max:100',
                    Rule::unique('user') -> ignore(Auth::user() -> id)
                ],
                'new_password' => 'nullable|min:8|max:16',
                'new_password_repeat' => 'nullable'
            ]);

            $user = User::find(Auth::user() -> id);
            $user -> family     = $valid['family'];
            $user -> first_name = $valid['first_name'];
            $user -> patronymic = $valid['patronymic'];
            $user -> email      = $valid['email'];

            // Setup new password
            if(isset($valid['new_password'])){
                if(isset($valid['new_password_repeat']) && !empty($valid['new_password']) && $valid['new_password'] == $valid['new_password_repeat'])
                    $user -> password = $valid['new_password'];
                else return redirect() -> route('user.forms.master', ['error' => 'Пароли не совпадают']);
            }

            $user -> save();
            
            return redirect() -> route('user.forms.master', [
                'tool' => 'account',
                'success' => 'Изменения сохранены успешно'
            ]);

        } // Validation error
        catch(ValidationException $e){
            return redirect() -> route('user.forms.master', [
                'error' => preg_replace('/\s*\(and \d+ more errors?\)\s*/', '', $e -> getMessage())
            ]);
        } // Other errors 
        catch(Throwable $e){
            return redirect() -> route('user.forms.master', [
                'error' => preg_replace('/\s*\(and \d+ more errors?\)\s*/', '', $e -> getMessage())
            ]);
        }
        

    }

}
