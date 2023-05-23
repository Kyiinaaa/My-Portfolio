<?php
session_start();

// Check if the user is already logged in as admin
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    // User is logged in as admin, allow access to the admin page
    header("Location: admin.php");
    exit();
}

// Check if the user is already logged in as user
if (isset($_SESSION['user']) && $_SESSION['user'] === true) {
    // User is logged in as user, allow access to the portfolio page
    header("Location: portfolio.php");
    exit();
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform the login logic here (e.g., validate credentials against a database)
    // Replace the code below with your actual login logic

    // Assuming the credentials are valid for demonstration purposes
    if ($username === 'admin' && $password === 'admin') {
        // Set session variables to log in as admin
        $_SESSION['admin'] = true;

        // Redirect to the admin page
        header("Location: admin.php");
        exit();
    } elseif ($username === 'user' && $password === 'user') {
        // Set session variables to log in as user
        $_SESSION['user'] = true;

        // Redirect to the portfolio page
        header("Location: portfolio.php");
        exit();
    } else {
        // Invalid username or password, display error message
        $error = "Invalid username or password";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
        
    <style>
        body {

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Montserrat', sans-serif;
            background-image: url("img/bg.jpg");
        }
        .login {
            width: 400px;
            padding: 50px;
            background-image: linear-gradient(60deg, #141414 5%, #595a5e 100%);
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .login h2 {
            text-align: center;
            margin: 0 0 30px 0;
            color: #f07878;
            font-size: 2.5rem;
        }
        .login p{
            font-size: 12px;
        }
        .login form {
            display: flex;
            flex-direction: column;
        }
        .login form label {
            margin-bottom: 5px;
        }
        .login form input[type="text"],
        .login form input[type="password"] {
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: 1px solid #838891;
            font: 1px;
        }
        .login form input[type="submit"] {
            padding: 10px 12px;
            margin-top: 10px;
            background-color: #17A589;
            color: #E6FAF6;
            border: 1px solid #9BA4B5;
            cursor: pointer;
        }
        .login form input[type="submit"]:hover {
            background-color: #1EDFB9;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        label{
            color: #f07878;
        }
        button{
            background-color: #f07878;
            color: white;
            padding: 8px;
            margin: 17px 0 13px 0;
            border: none;
            border-radius: 8px;
        }
        p{
            color: #f07878;
        }
        a{
            color: white;
        }


    </style>
</head>
<body>
    <div class="login">
        <h2>LOGIN!</h2>

        <form method="POST" action="">
        <?php if (isset($error)) : ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <div class="password-toggle" style="font-size: 0.8em;">
                <input type="checkbox" id="show-password" onchange="togglePasswordVisibility()">
                <label for="show-password">Show password</label>
            </div>
            <button type="submit" name="login" value="Login">Login</button>
            
        </form>
        
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var showPasswordCheckbox = document.getElementById('show-password');

            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
</body>
</html>