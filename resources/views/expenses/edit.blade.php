<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense</title>
    @extends('layouts.sidebar')
    <style>
        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            background: #f4f6f8;
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 230px;
            background: linear-gradient(180deg, #007bff, #00bcd4);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 25px 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 22px;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* Main content */
        .main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .edit-box {
            width: 400px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }
          .edit-box h1 {
   color: #007bff;
          }
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            width: 100%;
            background: linear-gradient(90deg, #007bff, #00bcd4);
            border: none;
            padding: 10px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.03);
        }

        .error-box {
            background: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        ul {
            margin: 0;
            padding-left: 18px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->


    <!-- Main Content -->
    <div class="main">
        <div class="edit-box">
            <h1>Edit Expense</h1>

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('expenses.update', $expense->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Expense Title</label>
    <input type="text" name="title" value="{{ $expense->title }}" required>

    <label>Amount</label>
    <input type="number" step="0.01" name="amount" value="{{ $expense->amount }}" required>

    <label>Category</label>
    <select name="category_id" required>
        <option value="">-- Select Category --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $expense->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <label>Date</label>
    <input type="date" name="date" value="{{ $expense->date }}" required>



    <button type="submit">Update Expense</button>
</form>
