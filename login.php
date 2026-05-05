<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ElectroStore</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { 
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #0b0c10; /* Ngjyra e erret e projektit */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            text-align: left;
        }

        .login-box h2 {
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

        .sign-in-btn {
            background-color: #f0f0f0; 
            color: black;
            border: none;
            padding: 15px 40px;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 20px;
        }

        .sign-in-btn:hover {
            background-color: #66fcf1;
            transform: scale(1.05);
        }

        
        .login-footer {
            margin-top: 20px;
            color: white;
        }
        .login-footer a {
            color: #66fcf1;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2>Login</h2>
        
        <form action="login_process.php" method="POST">
            <div class="input-group">
                <input type="text" name="email" placeholder="Username or Email" required>
            </div>
            
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            
            <button type="submit" class="sign-in-btn">Sign In</button>
        </form>

        <div class="login-footer">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>

</body>
</html>