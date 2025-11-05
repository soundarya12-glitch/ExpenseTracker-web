<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Chart data: total expenses by category
        $chartData = Expense::selectRaw('SUM(amount) as total, category_id')
            ->with('category')
            ->groupBy('category_id')
            ->get();

        // Total numbers
        $totalCategories = Category::count();
        $totalExpenses = Expense::count();
        $totalAmount = Expense::sum('amount');

        // Recent expenses
        $recent = Expense::with('category')
            ->orderBy('date', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'chartData',
            'totalCategories',
            'totalExpenses',
            'totalAmount',
            'recent'
        ));
    }
}
