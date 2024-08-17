<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LeaderboardController;

// Get the leaderboard sorted by points
Route::get('/users', [LeaderboardController::class, 'index']);

// Add a new user to the leaderboard
Route::post('/users', [LeaderboardController::class, 'addUser']);

// Delete a user from the leaderboard by ID
Route::delete('/users/{id}', [LeaderboardController::class, 'deleteUser']);

// Update the score for a user by ID (increment or decrement)
Route::patch('/users/{id}', [LeaderboardController::class, 'updateScore']);

// Get details of a specific user by ID
Route::get('/users/{id}', [LeaderboardController::class, 'getUser']);

// Get users grouped by score with average age
Route::get('/leaderboard', [LeaderboardController::class, 'groupedByScore']);
