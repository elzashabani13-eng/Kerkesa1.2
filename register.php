<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | ElectroStore</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #0b0c10; 
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-box {
            width: 100%;
            max-width: 400px;
            padding: 40px;
        }

        .register-box h2 {
            color: white;
            font-size: 2.5rem;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .input-group {
            margin-bottom: 25px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 0;
            background: transparent;
            border: none;
            border-bottom: 2px solid white;
            color: white;
            font-size: 1rem;
            outline: none;
            transition: 0.3s;
        }

        .input-group input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .input-group input:focus {
            border-bottom-color: #66fcf1;
        }

        .register-btn {
            background-color: #f0f0f0; 
            color: black;
            border: none;
            padding: 15px 50px;
            border-radius: 35px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 20px;
        }

        .register-btn:hover {
            background-color: #66fcf1;
            transform: scale(1.05);
        }

        .login-link {
            margin-top: 25px;
            color: white;
            font-size: 0.9rem;
        }

        .login-link a {
            color: #66fcf1;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="register-box">
        <h2>Create Account</h2>
        
        <form action="register_process.php" method="POST">
            <div class="input-group">
                <input type="text" name="full_name" placeholder="Full Name" required>
            </div>

            <div class="input-group">
                <input type="email" name="email" placeholder="Email Address" required>
            </div>
            
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            
            <button type="submit" class="register-btn">Register</button>
        </form>

        <div class="login-link">
            <p>Already have an account? <a href="login.php">Sign In</a></p>
        </div>
    </div>

</body>
</html>