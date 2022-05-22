<?php
    require_once("./includes/classes/FormSanitizer.php");
    require_once("./includes/config.php");
    require_once("./includes/classes/Account.php");
    require_once("./includes/classes/Constants.php");

    $account = new Account($con);

    if(isset($_POST["submitButton"])){
        // echo "Form submitted";
        // $firstName = $_POST["firstName"]; reads the first name
        $firstName = FormSanitizer::sanitizeFormString($_POST["firstName"]); //calling the function from another file.
        // echo $firstName;
        $lastName = FormSanitizer::sanitizeFormString($_POST["lastName"]); //calling the function from another file.
        $username = FormSanitizer::sanitizeFormUserName($_POST["username"]); //calling the function from another file.
        $email = FormSanitizer::sanitizeFormEmail($_POST["email"]); //calling the function from another file.
        $email2 = FormSanitizer::sanitizeFormEmail($_POST["email2"]); //calling the function from another file.
        $password = FormSanitizer::sanitizeFormPassword($_POST["password"]); //calling the function from another file.
        $password2 = FormSanitizer::sanitizeFormPassword($_POST["password2"]); //calling the function from another file.

        // $account->validateFirstName($firstName);
        $success = $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);
        
        if($success){
            //store session
            $_SESSION["userLoggedIn"] = $username;
            header("Location: index.php"); //redirecting user on Success
        }
    }
    //Function to make sure only text is entered in the form
    
    // Save last entered value in the Registeration Form
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
                      <h3>Sign Up</h3>
                        <span>To continue to use Starkflix</span>
                    </div>
                <form method="POST">
                    <?php
                        echo $account->getError(Constants::$firstNameCharacters);
                    ?>
                   <input type="text" name="firstName" placeholder="FirstName" value=<?php getInputValue("firstName"); ?> required>
                   
                    <?php
                        echo $account->getError(Constants::$lastNameCharacters);
                    ?>
                    <input type="text" name="lastName" placeholder="LastName" value=<?php getInputValue("lastName"); ?> required>
                   
                    <?php
                        echo $account->getError(Constants::$userNameCharacters);
                    ?>
                    <?php
                        echo $account->getError(Constants::$userNameTaken);
                    ?>
                    <input type="text" name="username" placeholder="UserName" required>
                   
                    <?php
                        echo $account->getError(Constants::$emailsDontMatch);
                    ?>
                    <?php
                        echo $account->getError(Constants::$emailInvalid);
                    ?>
                    <?php
                        echo $account->getError(Constants::$emailTaken);
                    ?>
                    <input type="email" name="email" placeholder="Email"  value=<?php getInputValue("email"); ?>  required>
                    <input type="email" name="email2" placeholder="Confirm Email"  value=<?php getInputValue("email2"); ?> required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="password2" placeholder="Confirm Password" required>
                    <input type="submit" name="submitButton" value="submit">
                </form>
                <a href="login.php" class="signInMessage">
                    Already have an account ? Sign in here
                </a>
              </div>  
            </div>
        </body>
</html>