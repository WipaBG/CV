<!DOCTYPE html>
<html>

<head>
    <title>CV Login Form</title>
    <link rel="stylesheet" href="views/login.css">
</head>

<body>
    <div class="main">
        
        <h3>Enter your login credentials:</h3>

        <form action="">
            <label for="first">
                Username:
            </label>
            <input type="text" id="username" 
                placeholder="Enter your Username" required>

            <label for="password">
                Password:
            </label>
            <input type="password" id="password"  
                placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit">
                    Submit
                </button>
            </div>
        </form>
        
        <p>Not registered?
            <a href="#" style="text-decoration: none;">
                Create an account
            </a>
        </p>
    </div>
</body>

</html>