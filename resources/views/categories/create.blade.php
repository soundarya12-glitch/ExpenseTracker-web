@extends('layouts.sidebar')

@section('content')
<style>
    body {
        background: #f4f6f8;
        font-family: 'Poppins', sans-serif;
    }

    .category-container {
        max-width: 500px;
        margin: 50px auto;
        background: #fff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .category-container h2 {
        text-align: center;
        font-weight: 700;
        color: #007bff;
        margin-bottom: 25px;
    }

    .form-control {
        border-radius: 10px;
        padding: 10px;
        font-size: 15px;
    }

    .btn-submit {
        width: 100%;
        background: linear-gradient(90deg, #007bff, #00bcd4);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-submit:hover {
        transform: scale(1.05);
    }

    .btn-back {
        display: block;
        text-align: center;
        margin-top: 20px;
        text-decoration: none;
        color: #007bff;
        font-weight: 500;
    }

    .btn-back:hover {
        text-decoration: underline;
    }
</style>

<div class="category-container">
    <h2>Add New Category</h2>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter category name" required>
            @error('name')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn-submit">💾 Save Category</button>
    </form>

    <a href="{{ route('categories.index') }}" class="btn-back">← Back to Categories</a>
</div>
@endsection
