<?php

namespace validation;
require_once 'validationinterface.php' ;

class cleanData implements ValidationInterface {

    public $name ;
    public $value ;
    public function __construct($name ,$value) {
        $this->name=$name;
        $this->value=$value;

    }
    public function validate()
    {

        return trim(htmlspecialchars($this->value));

    }

}


?>