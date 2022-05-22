<?php
class Account{
   private $con;
   private $errorArray = array(); 
    //constructor
   public function __construct($con){
    $this->con = $con;
   }

   public function register($fn ,$ln ,$un, $em ,$em2 ,$pw ,$pw2){
    $this->validateFirstName($fn);
    $this->validateLastName($ln);
    $this->validateUserName($un);
    $this->validateEmails($em, $em2);

    if(empty($this->errorArray)){
        return $this->insertUserDetails($fn, $ln, $un, $em, $pw);
    }
    return false;
   }

   //login function
   
   public function login($un, $pw){
    $pw = hash("sha512", $pw);
    
    $query = $this->con->prepare("SELECT * FROM users WHERE username = :un AND password = :pw");  
       $query -> bindValue(":un", $un);
       $query -> bindValue(":pw", $pw);

       $query -> execute();
       if($query->rowCount() == 1){
           return true;
       }

       array_push($this->errorArray, Constants::$loginFailed);
       return false;
   }

   private function insertUserDetails($fn, $ln, $un, $em, $pw){
       $pw = hash("sha512", $pw);
       $query = $this->con->prepare("INSERT INTO users (firstName, lastName, username, email, password) VALUES (:fn, :ln, :un, :em, :pw)");  
       $query -> bindValue(":fn", $fn);
       $query -> bindValue(":ln", $ln);
       $query -> bindValue(":un", $un);
       $query -> bindValue(":em", $em);
       $query -> bindValue(":pw", $pw);

       return $query -> execute();
   }


   private function validateFirstName($fn){
       if(strlen($fn) <2 || strlen($fn) >25){
           array_push($this->errorArray, Constants::$firstNameCharacters);
       }
   }

   private function validateLastName($ln){
       if(strlen($ln) <2 || strlen($ln) >25){
           array_push($this->errorArray, Constants::$lastNameCharacters);
       }
   }
   

   private function validateUserName($un){
       if(strlen($un) <2 || strlen($un) >25){
           array_push($this->errorArray, Constants::$userNameCharacters);
           return;
       }
       //Check if the username already exists in the DB
       $query = $this->con->prepare("SELECT * FROM users WHERE username=:un");
       $query->bindValue(":un", $un); //binding the value of the variable to the :un variable.

       $query->execute();
       if($query->rowCount() !=0){
           array_push($this->errorArray, Constants::$userNameTaken);
        }
    }
    
    private function validateEmails($em, $em2){
     if($em!= $em2){
         array_push($this->errorArray, Constants::$emailsDontMatch);
         return;
        }
        //Validate email is correct email check@gmail.com
        if(!filter_var($em, FILTER_VALIDATE_EMAIL)){
         array_push($this->errorArray, Constants::$emailInvalid);
     }

     //Check if the Email already exists in the DB
     $query = $this->con->prepare("SELECT * FROM users WHERE email=:em");
     $query->bindValue(":em", $em); //binding the value of the variable to the :em variable.

     $query->execute();
     if($query->rowCount() !=0){
         array_push($this->errorArray, Constants::$emailTaken);
      }

   }

   public function getError($error){
       if(in_array($error, $this->errorArray)){
         return "<span class='errorMessage'>$error</span>";
       }    
   }

}
?>