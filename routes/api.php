<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/v1/token/register', function (Request $request) {
    $request->validate(
        [
            'name'     => 'required|min:2|max:100',
            'email'    => 'required|email|unique:users|min:6|max:254',
            'password' => 'required|min:8|max:12'
        ]
    );

    $user = User::where('email', $request->email)->first();

    if ($user) {
        return response()->json(['message' => 'Email already exists'], 400);
    }

    $user = User::create(
        [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]
    );

    return ['token' => $user->createToken($request->email)->plainTextToken];
});

Route::post('/v1/token/create', function (Request $request) {
    $request->validate(
        [
            'email'    => 'required|email|min:6|max:254',
            'password' => 'required|min:8|max:12'
        ]
    );

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'The credentials are incorrect'], 400);
    }

    return ['token' => $user->createToken($request->email)->plainTextToken];
});

Route::post('/v1/contacts', [ContactController::class, 'store']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/v1/contacts', [ContactController::class, 'index']);

    Route::get('/v1/contacts/{id}', [ContactController::class, 'show']);

    Route::delete('/v1/contacts/{id}', [ContactController::class, 'destroy']);

});
