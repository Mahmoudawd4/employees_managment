<?php

namespace validation;
require_once 'validationinterface.php' ;

class Username implements ValidationInterface {

    public $name ;
    public $value ;
    public function __construct($name ,$value) {
        $this->name=$name;
        $this->value=$value;

    }
    public function validate()
    {
        if(!filter_var($this->value,FILTER_SANITIZE_STRING ,FILTER_FLAG_ENCODE_HIGH))
        {   
            return "$this->name is not valid username" ;

        }
        return "" ;
    }

}







?>