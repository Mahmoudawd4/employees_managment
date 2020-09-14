<?php

namespace validation;
require_once 'validationinterface.php' ;

class Password implements ValidationInterface {

    public $name ;
    public $value ;
    public function __construct($name ,$value) {
        $this->name=$name;
        $this->value=$value;

    }
    public function validate()
    {
        if(strlen($this->value <= 8))
        {   
            return "$this->name is not valid password" ;

        }
        return "" ;
    }

}







?>