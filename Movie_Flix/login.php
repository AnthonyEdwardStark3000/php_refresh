<?php

require_once("./includes/config.php");
require_once("./includes/classes/Account.php");
require_once("./includes/classes/FormSanitizer.php");
require_once("./includes/classes/Constants.php");

$account = new Account($con);


    if(isset($_POST["submitButton"])){
        $userName = FormSanitizer::sanitizeFormUserName($_POST["userName"]);
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]);
        $success = $account->login($userName,$password);
        if($success){
            //store session
            $_SESSION["userLoggedIn"] = $userName;
            header("Location: index.php");
        }

    }
    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
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
            <?php
                echo $account->getError(Constants::$loginFailed);
                ?>
                <input type="text" name="userName" placeholder="User Name" value="<?php getInputValue("userName");?>" required>
            <?php
                echo $account->getError(Constants::$loginFailed);
                ?>
                <input type="password" name="password" placeholder="Password" required>
                <input type="submit" name="submitButton" value="SUBMIT">
            </form>
            <a href="register.php" class="siginInMessage">Don't have an account ? Sign Up</a>
        </div>
    </div>
</body>
</html>