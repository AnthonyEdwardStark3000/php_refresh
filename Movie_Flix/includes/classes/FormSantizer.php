<?php
class FormSanitizer {
    public static function sanitizeFormString($inputText){
        $inputText = strip_tags($inputText);
        $inputText = trim($inputText);
        $inputText = strtoLower($inputText);
        $inputText = ucfirst($inputText);
        return $inputText;
    }

    public static function sanitizeFormUserName($inputText){
        $inputText = strip_tags($inputText);
        $inputText = trim($inputText);
        return $inputText;
    }
    
    public static function sanitizeFormPassword($inputText){
        $inputText = strip_tags($inputText);
        return $inputText;
    }
    
        public static function sanitizeFormEmail($inputText){
            $inputText = strip_tags($inputText);
            $inputText = trim($inputText);
            return $inputText;
        }
}
?>