<?php
    if(isset($_POST["submitButton"])){
        $firstName = $_POST[""]
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Movie_Flix</title>
    <link rel="stylesheet" type="text/css" href="./assets/style/style.css">
</head>
<body>
    <div class="sigin-container">
        <div class="column">
            <div class="header">
                <img src="./assets/style/images/LogoImage.png" alt="Logo Image" title="Logo" width="130px">
                <h3>Sign In</h3>
                <span>to continue the services from Movies Flix</span>
            </div>
            <form method="POST">
                <input type="text" name="userName" placeholder="User Name" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="submitButton" value="SUBMIT">
            </form>
            <a href="register.php" class="siginInMessage">Don't have an account ? Sign Up</a>
        </div>
    </div>
</body>
</html>