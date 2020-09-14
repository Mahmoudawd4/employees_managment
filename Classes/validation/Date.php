<?php

namespace validation;
require_once 'validationinterface.php' ;

class Data implements ValidationInterface {

    public $name ;
    public $value ;
    public function __construct($name ,$value) {
        $this->name=$name;
        $this->value=$value;

    }
    public function validate()
    {
        if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$this->value))
        {   
            return "$this->name is not valid data" ;

        }
        return "" ;
    }

}







?>