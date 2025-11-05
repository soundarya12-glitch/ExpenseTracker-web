<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // 🟢 Show all categories
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // 🟢 Show form to create new category
    public function create()
    {
        return view('categories.create');
    }

    // 🟢 Save new category
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Category::create(['name' => $request->name]);
        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    // 🟢 Edit form
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // 🟢 Update existing category
    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required']);
        $category->update(['name' => $request->name]);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    // 🟢 Delete category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
