<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Results;
use App\Models\Election;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/voter-login', 301);

Route::get('/codes/{id}', function($id){
    $election = Election::findOrFail($id);
    $voters = $election->voters;
    $pdf = Pdf::loadView('codes', compact('voters'));
    return $pdf->download('codes.pdf');
})->name('codes.download');

Route::get('/results/{election}', Results::class)->name('results');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
