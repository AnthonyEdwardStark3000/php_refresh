<?php
//Function to make sure only text is entered in the form
class FormSanitizer{

    public static function sanitizeFormString($inputText){
        $inputText = strip_tags($inputText); //removes unwanted tags
        $inputText = str_replace(" ", "", $inputText); //removes unwanted or accidental spaces while entering data
        //or $inputText = trim($inputText);
        $inputText = strtolower($inputText);
        $inputText = ucfirst($inputText);
        return $inputText;
    }

    public static function sanitizeFormUserName($inputText){
        $inputText = strip_tags($inputText); //removes unwanted tags
        $inputText = str_replace(" ", "", $inputText); //removes unwanted or accidental spaces while entering data
        //or $inputText = trim($inputText);
        return $inputText;
    }
    
    public static function sanitizeFormPassword($inputText){
        $inputText = strip_tags($inputText); //removes unwanted tags
        return $inputText;
    }
    
    public static function sanitizeFormEmail($inputText){
        $inputText = strip_tags($inputText); //removes unwanted tags
        $inputText = str_replace(" ", "", $inputText); //removes unwanted or accidental spaces while entering data
        //or $inputText = trim($inputText);
        return $inputText;
    }

}
?>