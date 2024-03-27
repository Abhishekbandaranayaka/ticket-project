<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TicketController::class, 'index'])->name('ticket.index');

Route::get('/add-comment', [TicketController::class, 'showAddCommentForm'])->name('ticket.showAddCommentForm');
Route::post('/add-comment', [TicketController::class, 'addComment'])->name('ticket.addComment');
