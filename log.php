<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
   <link rel="stylesheet" href="log.css">
</head>
<body>
    <div class="login-container">
        
        
        <h2>Login</h2>
        <form  id="loginForm" method="post" action="valid.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" pattern="^[A-Z][a-zA-Z0-9]{7,}$" 
                title="Password must start with an uppercase letter, contain at least one number, and be 8 characters long." name="password" required>
            </div>
            <input class="btn" type="submit" name="submit" value="login">
            <a href="create.php">Sign Up</a>
        </form>
    </div>
</body>
</html>



