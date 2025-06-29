<?php

use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\NameController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('react.flashcards');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// name route 

Route::prefix('name')->name('name.')->group(function () {
    Route::get('/', [NameController::class, 'index'])->name('index');
    Route::post('/', [NameController::class, 'store'])->name('store');
    Route::get('{id}/edit', [NameController::class, 'edit'])->name('edit');
    Route::put('{id}', [NameController::class, 'update'])->name('update');
    Route::delete('{id}', [NameController::class, 'destroy'])->name('destroy');
});

// react flash card view
Route:: get('/flashcards',function(){
  
    return view('react.flashcards');
});
require __DIR__.'/auth.php';

//  react favorites view

Route::get('/favorites-view', function () {
    return view('react.Favoritescard'); // loads the UI
});

// linking backend with api
Route::get('/proxy/words', function (Request $request) {
    $limit = $request->input('limit', 5);
    $page = $request->input('page', 1);

   $url="https://finnfast.fi/api/words?includeCustom=false&limit={$limit}&page={$page}&all=false";

    $response = Http::withHeaders([
        'x-api-key' => 'b2c005bc4c97461bba742ba90519f7f2',
        'Accept' => 'application/json',
    ])->get($url);

    if ($response->successful()) {
        return response()->json($response->json(), $response->status());
    }

    return response()->json(['error' => 'Failed to fetch words'], $response->status());
});

// route for saving file adn delete

Route::get('/favorites', [FavoriteController::class, 'index']);
Route::post('/favorites', [FavoriteController::class, 'store']);
Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy']);