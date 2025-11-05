@extends('layouts.sidebar')

@section('content')
    <style>
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }
    </style>

    <h2>📊 Dashboard</h2>

    <div class="summary-cards">
        <div class="card">
            <h4>Total Categories</h4>
            <p>{{ $totalCategories ?? 0 }}</p>
        </div>
        <div class="card">
            <h4>Total Expenses</h4>
            <p>{{ $totalExpenses ?? 0 }}</p>
        </div>
        <div class="card">
            <h4>Total Amount</h4>
            <p>₹{{ $totalAmount ?? 0 }}</p>
        </div>
    </div>

    <div class="dashboard-grid">
        <div class="chart-container">

            <canvas id="expenseChart"></canvas>
        </div>

        <div class="category-section">


            @if(isset($categories) && $categories->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else

            @endif
        </div>
    </div>


@endsection
