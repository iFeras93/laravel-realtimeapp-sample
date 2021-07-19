<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', \App\Http\Controllers\UsersListApiController::class);
Route::get('users/projects', function () {
    if (auth()->user()->id === 1)
        return response()->json(\App\Models\Project::query()->get()->toArray());

    return response()->json(\App\Models\Project::query()->where('user_id', '=', auth()->user()->id)->with(['user'])->get()->toArray());
});
