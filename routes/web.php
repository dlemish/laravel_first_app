<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;

// Authentication routes
Route::controller(AuthController::class) -> group(function(){
    Route::post('/user/authenticate', 'authenticate');
    Route::post('/user/register', 'register');
    Route::post('/user/logout', 'logout');
});

// User account routes
Route::controller(AccountController::class) -> group(function(){
    Route::post('/user/account/update', 'update');
});

// Web-forms routes
Route::middleware('web') -> group(function(){

    // Authentication form
    Route::get('/user/forms/authentication', function(Request $request){
        $data = ['error' => $request['error']];
        if(Auth::check()) return redirect() -> route('user.forms.master');
        else return view('user.forms.authentication', $data);
    }) -> name('user.forms.authentication');

    // Registration form
    Route::get('/user/forms/registration', function(Request $request){
        $data = [
            'error'           => $request['error'],
            'prev_family'     => $request['prev_family'],
            'prev_first_name' => $request['prev_first_name'],
            'prev_patronymic' => $request['prev_patronymic'],
            'prev_email'      => $request['prev_email'],
            'prev_login'      => $request['prev_login']
        ];
        if(Auth::check()) return redirect() -> route('user.forms.master');
        else return view('user.forms.registration', $data);
    }) -> name('user.forms.registration');

    // Registration complete form
    Route::get('/user/forms/registration/complete', function(){
        if(Auth::check()) return redirect() -> route('user.forms.master');
        else return view('user.forms.registration_complete');
    }) -> name('user.forms.registration.complete');

    // User master form
    Route::get('/user/{tool?}/{action?}', function(Request $request, string $tool = 'account', string $action = 'default'){

        $data = [
            'tool' => $tool,
            'action' => $action,
            'error' => $request['error'],
            'success' => $request['success']
        ];

        if(Auth::check()){
            $data['user'] = Auth::user();
            return view('user.forms.master', $data);
        } else return redirect() -> route('user.forms.authentication');

    }) -> name('user.forms.master');

});