<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @extends('layouts.sidebar')
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg p-4" style="max-width: 500px; margin: auto; border-radius: 15px;">
        <h3 class="text-center text-primary mb-4">Add New Expense</h3>

        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Expense Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter expense title" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Enter amount" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Note (optional)</label>
                <textarea name="note" class="form-control" placeholder="Enter note if any"></textarea>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">💾 Save Expense</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
