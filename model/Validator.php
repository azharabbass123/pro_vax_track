<?php 

class Validator{
    public static function string($value, $min = 1, $max = 255){
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function date($date){
        function validateDate($date, $format = 'M-d-y') { 
            $d = DateTime::createFromFormat($format, $date); 
            return $d && $d->format($format) === $date; 
        } 
          
        // Driver code 
        return validateDate($date, 'M-d-y');
    }
}