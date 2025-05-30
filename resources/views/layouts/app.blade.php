<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Auth</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            background-color: #f7fafc;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        nav {
            background-color: #fff;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul li a,
        nav ul li form button {
            text-decoration: none;
            color: #2d3748;
            padding: 8px 15px;
            border-radius: 4px;
        }

        nav ul li a:hover,
        nav ul li form button:hover {
            background-color: #edf2f7;
        }

        nav ul li form button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: inherit;
        }

        .auth-links {
            display: flex;
        }

        .auth-links li+li {
            margin-left: 15px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 20px auto;
        }

        .form-container h2 {
            text-align: center;
            color: #2d3748;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #4a5568;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #4299e1;
            outline: none;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
        }

        .form-group .error-message {
            color: #e53e3e;
            font-size: 0.875em;
            margin-top: 5px;
        }

        .form-group .remember-me {
            display: flex;
            align-items: center;
        }

        .form-group .remember-me input {
            margin-right: 8px;
        }

        .submit-button {
            display: block;
            width: 100%;
            padding: 10px 15px;
            background-color: #4299e1;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #2b6cb0;
        }

        .text-center {
            text-align: center;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        /* 16px */
        .text-sm {
            font-size: 0.875rem;
        }

        /* 14px */
        .text-gray-600 {
            color: #718096;
        }

        .hover\:text-gray-900:hover {
            color: #1a202c;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home Page</a></li>
            <li class="auth-links">
                @guest
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
                @else
                <div style="display:flex; flex-direction:column ;align-items:center; ">
                    <span>Welcome, <b>{{ Auth::user()->name }} </b></span>
                    <span>Role: {{ Auth::user()->getRoleNames()->implode(', ') }} </span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                <a href="{{ route('articles.index') }}">Articles</a>
                @endguest
            </li>
        </ul>
    </nav>

    <div class="container">



        @yield('content')
    </div>
</body>

</html>