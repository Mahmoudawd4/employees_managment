<?php
namespace validation;
require_once 'validationinterface.php' ;
require_once 'Str.php' ;
require_once 'required.php' ;
require_once 'Numaric.php' ;
require_once 'Max.php' ;
require_once 'Email.php' ;
require_once 'requiredImage.php' ;
require_once 'Image.php' ;
require_once 'username.php' ;
require_once 'Date.php' ;
require_once 'Int.php' ;
require_once 'Password.php' ;
require_once 'phone.php' ;



class Validator{
    public $errors=[];
    public function makeValidation(ValidationInterface $v)
    {
       return $v->validate();
    }

    public function rules($name ,$value , array $rules)
    {
        foreach ($rules as $rule) {
            if($rule == 'required')
            {
                $error = $this->makeValidation(new Required($name ,$value));
            }elseif($rule == 'string')
            {
                $error = $this->makeValidation(new Str($name ,$value));
            }
            elseif($rule == 'Email')
            {
                $error = $this->makeValidation(new Email($name ,$value));
            }
            elseif($rule == 'numaric')
            {
                $error = $this->makeValidation(new Numaric($name ,$value));
            }
            elseif($rule == 'Max:100')
            {
                $error = $this->makeValidation(new Max($name ,$value));
            }
            elseif($rule == 'required-image')
            {
                $error = $this->makeValidation(new RequiredImage($name ,$value));
            }
            elseif($rule == 'image')
            {
                $error = $this->makeValidation(new Image($name ,$value));
            }
            elseif($rule == 'username')
            {
                $error = $this->makeValidation(new Username($name ,$value));
            }
            elseif($rule == 'date')
            {
                $error = $this->makeValidation(new Data($name ,$value));
            }
            elseif($rule == 'inte')
            {
                $error = $this->makeValidation(new Inte($name ,$value));
            }
            elseif($rule == 'password')
            {
                $error = $this->makeValidation(new Password($name ,$value));
            }
            elseif($rule == 'phone')
            {
                $error = $this->makeValidation(new phone($name ,$value));
            }
            elseif($rule == 'imgfile')
            {
                $error = "Sorry, file already exists.";
            }
            else
            {

                $error ='';
            }
            if ($error !== '') {
                array_push($this->errors , $error);
            }
        }
    }

}








?>