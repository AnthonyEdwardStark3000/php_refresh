<?php
    require_once("./includes/classes/FormSanitizer.php");
    require_once("./includes/config.php");
    require_once("./includes/classes/Account.php");
    require_once("./includes/classes/Constants.php");

    $account = new Account($con);

    if(isset($_POST["submitButton"])){
        // echo "Form submitted";
        $username = FormSanitizer::sanitizeFormUserName($_POST["username"]); //calling the function from another file.
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]); //calling the function from another file.
        
        $success = $account->login($username, $password);

        if($success){
            //store session
            $_SESSION["userLoggedIn"] = $username; 
            header("Location: index.php"); //redirecting user on Success
        }
    }

    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Welcome to Starkflix</title>
        <link rel="stylesheet" href="./assets/style/style.css">
    </head>
        <body>
            <div class="signInContainer">
              <div class="column">
                  <div class="header">
                      <img src="./assets/images/logo.png" title="logo" alt="site logo" srcset="">
                      <h3>Sign In</h3>
                        <span>To continue to use Starkflix</span>
                    </div>
                <form method="POST">
                    <?php
                        echo $account->getError(Constants::$loginFailed);
                    ?>
                    <input type="text" name="username" placeholder="UserName" value="<?php getInputValue("username"); ?>" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" name="submitButton" value="submit">
                </form>
                <a href="register.php" class="signupMessage">
                    Don't have an account ? Sign Up here
                </a>
              </div>  
            </div>
        </body>
</html>