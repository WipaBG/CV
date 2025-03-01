<html>

<head>
    <title>Account Creation Form</title>
    <link rel="stylesheet" href="views/login.css">
</head>

<body>
    <div class="main">
        <h3>Choose your login credentials:</h3>

        <form action="index.php?action=register" method="POST">
            <label for="first">
                Username:
            </label>
            <input type="text" id="first" name="first" placeholder="Enter your Username" required>

            <label for="password">
                Password:
            </label>
            <input type="password" id="password" name="password" 
                placeholder="Enter your Password" required>

			 <label for="passwordC">
                Confirm Password:
            </label>
            <input type="password" id="passwordC" name = "passwordC"
                placeholder="Confirm your Password" required>
				
            <div class="wrap">
                <button type="submit">
                    Submit
                </button>
            </div>
        </form>
        
    </div>
</body>

</html>