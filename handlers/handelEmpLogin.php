<?php

session_start();

require_once '../Classes/validation/validator.php';
require_once '../Classes/EmpAdmin.php';




use validation\Validator;


//if form is submeted 
if (isset($_POST['login-submit'])) {
    
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

            $admin =new EmpAdmin();
           $result=$admin->attempt($email ,$password);

            // if stored sucssesfuly
            if($result !== null)
            {
                $_SESSION['id']=$result['id'];
                $_SESSION['name']=$result['name'];

                header('location:../myTasks.php');

            }else
            {

                $_SESSION['errors']=['your credenatials  are not corect'] ;
                header('location:../empLogin.php');
        
        
            }

    }else
    {
        $_SESSION['errors']=$erorrs ;
        header('location:../empLogin.php');

    }

    






}else{
    header('location:../empLogin.php');
}

?>