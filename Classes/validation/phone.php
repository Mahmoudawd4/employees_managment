<?php

namespace validation;
require_once 'validationinterface.php' ;

class phone implements ValidationInterface {

    public $name ;
    public $value ;
    public function __construct($name ,$value) {
        $this->name=$name;
        $this->value=$value;

    }
    public function validate()
    {
        if(!preg_match("/^01[0-2]{1}[0-9]{8}$/", $this->value))
        {   
            return "$this->name is not valid phone" ;

        }
        return "" ;
    }

}







?>