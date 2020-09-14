<?php

session_start();

require_once '../Classes/validation/validator.php';
require_once '../Classes/Admin.php';




use validation\Validator;


//if form is submeted 
if (isset($_POST['submit'])) {
    
    //read data from form 
    $email=$_POST['email'];
    $password=$_POST['password'];

    //prperfunction clean Data 
    function preper($input)
    {
        return trim(htmlspecialchars($input));
    }

    $email=preper($email);
    $password=preper($password);


    //validition
    $v=new Validator;
    $v->rules('email' ,$email ,['required' ,'Email' , 'Max:100']);
    $v->rules('password' ,$password ,['required' ,'password']);
    $erorrs=$v->errors;


    //if is data falid
    if ($erorrs == []) {

            $admin =new Admin();
           $result=$admin->attempt($email ,$password);

            // if stored sucssesfuly
            if($result !== null)
            {
                $_SESSION['id']=$result['id'];
                $_SESSION['email']=$result['email'];

                header('location:../allTasks.php');

            }else
            {

                $_SESSION['errors']=['your credenatials  are not corect'] ;
                header('location:../admLogin.php');
        
        
            }

    }else
    {
        $_SESSION['errors']=$erorrs ;
        header('location:../admLogin.php');

    }

    






}else{
    header('location:../admLogin.php');
}

?>