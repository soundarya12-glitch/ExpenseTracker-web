<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Expenses PDF</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h2 { text-align: center; color: #007bff; }
    </style>
</head>
<body>
    <h2>Expense Report</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Amount (₹)</th>
                <th>Category</th>
                <th>Date</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->title }}</td>
                <td>{{ number_format($expense->amount, 2) }}</td>
                <td>{{ $expense->category->name ?? 'N/A' }}</td>
                <td>{{ $expense->date }}</td>
                <td>{{ $expense->note }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
