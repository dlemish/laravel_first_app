<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

// Authentication routes
Route::controller(AuthController::class) -> group(function(){
    Route::post('/user/register', 'register');
    Route::post('/user/authenticate', 'authenticate');
});

// Forms routes
Route::middleware('web') -> group(function(){

    // Get register form
    Route::get('/user/forms/registration', function(Request $request){
        if(Auth::check()) return back();
        else{
            $data = ['error' => $request -> input('error')];
            return view('user.forms.registration', $data);
        }
    }) -> name('user.forms.registration');

    // Get register.complete form
    Route::get('/user/forms/registration/complete', function(){
        if(Auth::check()) return back();
        else return view('user.forms.registration_complete');
    }) -> name("user.forms.registration.complete");;

    // Get Authentication form
    Route::get('/user/forms/authentication', function(Request $request){
        if(Auth::check()) return back();
        else{
            $data = ['error' => $request -> input('error')];
            return view('user.forms.authentication', $data);
        }
    }) -> name("user.forms.authentication");

});

// Web-site routes
Route::get('/', function (){
    if(Auth::check()) return view('welcome');
    else return redirect() -> route('user.forms.authentication');
});
