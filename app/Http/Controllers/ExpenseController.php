<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; //
class ExpenseController extends Controller
{
    // 🟢 Show all expenses with pagination + sorting
    public function index(Request $request)
    {
        // User selects sorting from query (?sort=date or ?sort=amount)
        $sort = $request->get('sort', 'date'); // default: sort by date

        // Get only logged-in user’s expenses, sorted & paginated
        $expenses = Expense::with('category')
            ->where('user_id', auth()->id())
            ->orderBy($sort, 'desc')
            ->paginate(5); // 5 per page


        return view('expenses.index', compact('expenses', 'sort'));
    }

    // 🟢 Show create form
    public function create()
    {
        $categories = Category::all();
        return view('expenses.create', compact('categories'));
    }

    // 🟢 Store new expense
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        Expense::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'note' => $request->note,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense added successfully!');
    }

    // 🟢 Edit form
    public function edit(Expense $expense)
    {
        $categories = Category::all();
        return view('expenses.edit', compact('expense', 'categories'));
    }

    // 🟢 Update expense
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $expense->update([
            'title' => $request->title,
            'amount' => $request->amount,
            'category_id' => $request->category_id,
            'date' => $request->date,
            'note' => $request->note,
        ]);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully!');
    }

    // 🟢 Delete expense
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully!');
    }
    public function exportCSV()
{
    $filename = 'expenses_' . now()->format('Y-m-d_H-i-s') . '.csv';
    $expenses = Expense::with('category')
        ->where('user_id', auth()->id())
        ->get();

    $columns = ['ID', 'Title', 'Amount', 'Category', 'Date', 'Note'];

    $callback = function() use ($expenses, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($expenses as $expense) {
            fputcsv($file, [
                $expense->id,
                $expense->title,
                $expense->amount,
                $expense->category->name ?? 'N/A',
                $expense->date,
                $expense->note,
            ]);
        }
        fclose($file);
    };

    return Response::stream($callback, 200, [
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename={$filename}",
    ]);
}
public function exportPDF()
{
    $expenses = Expense::with('category')
        ->where('user_id', auth()->id())
        ->get();

    $pdf = Pdf::loadView('expenses.pdf', compact('expenses'));
    return $pdf->download('expenses_' . now()->format('Y-m-d_H-i-s') . '.pdf');
}

}

