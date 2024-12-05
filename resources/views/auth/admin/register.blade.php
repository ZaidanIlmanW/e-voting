<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>
    <style>
        /* Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: white;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .register-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .register-container h1 {
            font-size: 1.8rem;
            color: #333;
            text-align: center;
            margin-bottom: 1rem;
        }

        .register-container form {
            display: flex;
            flex-direction: column;
        }

        .register-container input {
            padding: 0.8rem;
            margin: 0.5rem 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .register-container input:focus {
            border-color: #6a11cb;
            outline: none;
        }

        .register-container button {
            background: #2575fc;
            color: #fff;
            border: none;
            padding: 0.8rem;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 1rem;
            transition: background 0.3s ease;
        }

        .register-container button:hover {
            background: #6a11cb;
        }

        .register-container .link {
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #666;
        }

        .register-container .link a {
            color: #2575fc;
            text-decoration: none;
            font-weight: bold;
        }

        .register-container .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Daftar Akun </h1>
        <form action="{{ route('admin.register.submit') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            
            <button type="submit">Daftar</button>
        </form>
        <div class="link">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
        </div>
    </div>
</body>
</html>
