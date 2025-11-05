<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker web</title>
       @include('layouts.navbar')
    <!-- Center Image -->
     <div class="main-content">
        <img src="{{ asset('images/home.jpg') }}" alt="Expense Tracker Illustration">
    </div>

    <!-- Footer -->
    <footer>
        <p>© {{ date('Y') }} My Website</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
