@extends('layouts.sidebar')

@section('content')
<style>
    body {
        background: #f4f6f8;
        font-family: 'Poppins', sans-serif;
    }

    .expenses-container {
        max-width: 900px;
        margin: 50px auto;
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        margin-bottom:20px;
    }

    h2 {
        text-align: center;
        font-weight: 700;
        color: #007bff;
        margin-bottom: 25px;
    }

    .btn-add {
        display: inline-block;
        margin-bottom: 20px;
        padding: 10px 18px;
        background: linear-gradient(90deg, #007bff, #00bcd4);
        color: white;
        border: none;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-add:hover {
        transform: scale(1.03);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
        text-align: left;
    }

    th {
        background: #f1f5f9;
        color: #333;
        font-weight: 600;
    }

    td {
        color: #555;
    }

    .btn-edit {
        background: #28a745;
        color: white;
        border: none;
        padding: 9px 15px;
        border-radius: 8px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn-edit:hover {
        background: #218838;
    }

    .btn-delete {
        background: #dc3545;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 8px;
        transition: 0.3s;
    }

    .btn-delete:hover {
        background: #c82333;
    }
.btn-sort{
     background:#BA8E23;
        color: white;
        border: none;
        padding: 9px 15px;
        border-radius: 9px;
        text-decoration: none;
        transition: 0.3s;
        margin-left:290px;
}
.btn-sorts{
      background: #E75480;
        color: white;
        border: none;
        padding: 9px 15px;
        border-radius: 9px;
        text-decoration: none;
        transition: 0.3s;

}

</style>

<div class="expenses-container">
    <h2>💰 Expense List</h2>
 <a href="{{ route('expenses.create') }}" class="btn-add">+ Add New Expense</a>
    @if(session('success'))
        <div style="color: green; margin-bottom: 10px; font-weight: 600;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>category_id</th>
                <th>Title</th>
                <th>Amount (₹)</th>
                <th>Category</th>
                <th>Date</th>
                <th>Note</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($expenses as $expense)
                <tr>
                    <td>{{ $expense->id }}</td>
                    <td>{{ $expense->title }}</td>
                    <td>{{ number_format($expense->amount, 2) }}</td>
                    <td>{{ $expense->category->name ?? 'No Category' }}</td>
                    <td>{{ \Carbon\Carbon::parse($expense->date)->format('d-m-Y') }}</td>
                    <td>{{ $expense->note ?? '—' }}</td>
                    <td>
                        <a href="{{ route('expenses.edit', $expense->id) }}" class="btn-edit">Edit</a>

                        <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Are you sure to delete this expense?')">Delete</button>
                            <div class="mt-4 d-flex justify-content-center">
    {{ $expenses->links() }}
</div>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center; color:gray;">No expenses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
       <div class="text-center mb-6">

    <a href="{{ route('expenses.index', ['sort' => 'date']) }}" class=" btn-sort">Sort by Date</a>
    <a href="{{ route('expenses.index', ['sort' => 'amount']) }}" class="btn-sorts">Sort by Amount</a>
    <a href="{{ route('expenses.export.csv') }}" class="btn btn-success me-2">📊 Export CSV</a>
    <a href="{{ route('expenses.export.pdf') }}" class="btn btn-danger">📄 Export PDF</a>
</div>

</div>

@endsection
