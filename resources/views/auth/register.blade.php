<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Reset Margin and Padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        .register-container {
            background: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .register-container h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            font-size: 1rem;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group input:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0 0 5px rgba(37, 117, 252, 0.5);
        }

        button[type="submit"] {
            width: 100%;
            padding: 0.8rem;
            background-color: #2575fc;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #6a11cb;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input id="name" type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input id="email" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html> -->