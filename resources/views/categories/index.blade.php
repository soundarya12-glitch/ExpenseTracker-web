@extends('layouts.sidebar')

@section('content')
<style>
    body {
        background: #f4f6f8;
        font-family: 'Poppins', sans-serif;
    }

    .category-wrapper {
        max-width: 900px;
        margin: 40px auto;
        background: #fff;
        padding: 30px 40px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .category-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .category-header h2 {
        font-weight: 700;
        color: #007bff;
    }

    .btn-add {
        background: linear-gradient(90deg, #007bff, #00bcd4);
        color: #fff;
        padding: 10px 18px;
        border-radius: 10px;
        border: none;
        text-decoration: none;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-add:hover {
        transform: scale(1.05);
        text-decoration: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        text-align: left;
        padding: 12px;
        border-bottom: 1px solid #e2e2e2;
    }

    th {
        background: #f0f8ff;
        color: #333;
        font-weight: 600;
    }

    td {
        font-size: 15px;
    }

    .btn-edit {
        background: #ffc107;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        margin-right: 5px;
    }

    .btn-delete {
        background: #dc3545;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 8px;
        font-size: 14px;
    }

    .alert-success {
        background-color: #d1e7dd;
        color: #0f5132;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 15px;
    }
</style>

<div class="category-wrapper">
    <div class="category-header">
        <h2>📂 All Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn-add">+ Add New Category</a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if ($categories->isEmpty())
        <p>No categories added yet.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn-edit">✏️ update</a>

                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Delete this category?')">🗑 Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
