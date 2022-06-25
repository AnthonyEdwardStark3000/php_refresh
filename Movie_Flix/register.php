<?php
    require_once("./includes/config.php");
    require_once("./includes/classes/FormSantizer.php");

    if(isset($_POST["submitButton"])){
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]);
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]);
        $userName = FormSanitizer::sanitizeFormUserName($_POST["userName"]);
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]);
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]);
        // echo $firstName;
        // echo $lastName;
        // echo $userName;
        // echo $email;
        // echo $email2;
        // echo $password;
        // echo $password2;
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
                <h3>Sign Up</h3>
                <span>to continue the services from Movies Flix</span>
            </div>
            <form method="POST">
                <input type="text" name="firstName" placeholder="First Name" required>
                <input type="text" name="lastName" placeholder="Last Name" required>
                <input type="text" name="userName" placeholder="User Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="email" name="email2" placeholder="Confirm Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password2" placeholder="Confirm Password" required>
                <input type="submit" name="submitButton" value="SUBMIT">
            </form>
            <a href="login.php" class="siginInMessage">Already have an account ? Sign In here</a>
        </div>
    </div>
</body>
</html>