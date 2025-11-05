<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Expense;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Home Page (Welcome or Landing Page)
Route::get('/', function () {
    return view('welcome');
});


// 📊 Dashboard Page — shows summary and recent expenses
Route::get('/dashboard', function () {
    $totalCategories = Category::count();
    $totalExpenses = Expense::count();
    $totalAmount = Expense::sum('amount');
    $recentExpenses = Expense::latest()->take(5)->get();

    return view('dashboard', compact('totalCategories', 'totalExpenses', 'totalAmount', 'recentExpenses'));
})->middleware(['auth', 'verified'])->name('dashboard');

// 🗂 Category CRUD
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// 💸 Expense CRUD
Route::resource('expenses', ExpenseController::class)->middleware('auth');
Route::resource('categories', CategoryController::class);

Route::get('/expenses/export/csv', [ExpenseController::class, 'exportCSV'])->name('expenses.export.csv');
Route::get('/expenses/export/pdf', [ExpenseController::class, 'exportPDF'])->name('expenses.export.pdf');
// 👤 Profile Routes (edit, update, delete)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔐 Auth routes (login, register, etc.)
require __DIR__ . '/auth.php';
