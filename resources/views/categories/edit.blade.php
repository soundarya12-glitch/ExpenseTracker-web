@extends('layouts.sidebar')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #e0f7fa, #fce4ec);
        font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background: #fff;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        width: 400px;
        text-align: center;
    }

    h2 {
        color: #007bff;
        margin-bottom: 20px;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    button {
        background: linear-gradient(90deg, #007bff, #00bcd4);
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        transition: transform 0.3s;
    }

    button:hover {
        transform: scale(1.05);
    }

    a {
        display: inline-block;
        margin-top: 15px;
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>

<div class="container">
    <h2>Edit Category</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $category->name }}" required>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('categories.index') }}">⬅ Back to Categories</a>
</div>
@endsection
