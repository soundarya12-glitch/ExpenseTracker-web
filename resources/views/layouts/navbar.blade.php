 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: linear-gradient(135deg, #e0f7fa, #fce4ec);
            font-family: 'Poppins', sans-serif;
        }

        /* Navbar */
        nav {
            background: linear-gradient(90deg, #007bff, #00bcd4);
            box-shadow: 0 3px 8px rgba(0,0,0,0.2);
        }
        .navbar-brand {
            color: #fff !important;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .nav-link {
            color: #fff !important;
            font-weight: 500;
            transition: all 0.3s;
            margin-inline-start: 20px;
            margin-right:8px;
        }
        .nav-link:hover {
            color: #ffeb3b !important;
            transform: scale(1.05);
        }

        /* Center image */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .main-content img {
            border-radius: 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            transition: transform 0.3s ease;
            width:50% ;
        }
        .main-content img:hover {
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background: linear-gradient(90deg, #00bcd4, #007bff);
            color: white;
            text-align: center;
            padding: 15px 0;
            font-size: 14px;
            letter-spacing: 0.5px;
        }
        li{
            margin: left 20px;
        }
        body.dark-mode {
    background: linear-gradient(135deg, #121212, #1e1e1e);
    color: white;
}

body.dark-mode nav {
    background: linear-gradient(90deg, #333, #555);
}

body.dark-mode footer {
    background: linear-gradient(90deg, #555, #333);
}

body.dark-mode .nav-link {
    color: #ffeb3b !important;
}

body.dark-mode .btn-light {
    background-color: #333;
    color: #fff;
    border: 1px solid #777;
}

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Expense Tracker </a>
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>

            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>


                <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">Contact us</a>
</li>
                      <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">Login</a>
</li>
    <li class="nav-item">
         <a class="nav-link"   href="{{ route('register') }}">Register</a>

                </ul>
                 <button id="themeToggle" class="btn btn-light ms-3">🌙 </button>
            </div>
        </div>
    </nav>
<script>
  const toggleBtn = document.getElementById('themeToggle');
  const body = document.body;

  // check previous theme
  if (localStorage.getItem('theme') === 'dark') {
      body.classList.add('dark-mode');
      toggleBtn.textContent = '☀️ ';
      toggleBtn.classList.replace('btn-light', 'btn-dark');
  }

  toggleBtn.addEventListener('click', () => {
      body.classList.toggle('dark-mode');
      const darkModeOn = body.classList.contains('dark-mode');
      toggleBtn.textContent = darkModeOn ? '☀️ ' : '🌙 ';
      toggleBtn.classList.toggle('btn-dark', darkModeOn);
      toggleBtn.classList.toggle('btn-light', !darkModeOn);
      localStorage.setItem('theme', darkModeOn ? 'dark' : 'light');
  });
</script>
