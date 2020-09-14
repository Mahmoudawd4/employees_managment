<?php

session_start();
require_once '../Classes/Employees.php';
require_once '../Classes/validation/validator.php';
use validation\Validator;

if (!isset($_SESSION['id'])) {
  
    header('location:../index.php');
    die();
  }



//if form is submeted 
if (isset($_POST['submit'])) {
    
    //read data from form 
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $birthday=$_POST['birthday'];


    //prperfunction clean Data 
    function preper($input)
    {
            return trim(htmlspecialchars($input));
    }

    $name=preper($name);
    $email=preper($email);
    $password=preper($password);
    $city=preper($city);
    $gender=preper($gender);
    $phone=preper($phone);
    $birthday=preper($birthday);

    //validition
    $v=new Validator;
    $v->rules('name' ,$name ,['required' ,'string' , 'Max:100']);
    $v->rules('email' ,$email ,['required' ,'Email']);
    $v->rules('password' ,$password ,['required' ,'password']);
    $v->rules('city' ,$city ,['required' ,'string' , 'Max:100']);
    $v->rules('gender' ,$gender ,['required']);
    $v->rules('phone' ,$phone ,['required' ,'phone']);
    $v->rules('birthday' ,$birthday ,['required' ,'date']);
    $erorrs=$v->errors;







    //if is data falid
    if ($erorrs == []) {


        $data = [
            'name' => $name ,
            'email' => $email ,
            'password' => $password ,
            'city' => $city ,
            'gender' => $gender ,
            'phone' => $phone ,
            'birthday' => $birthday 
        ];
        
        //store
        $emp=new Employees;
        $result=$emp->store($data);

            // if stored sucssesfuly
            if($result == true)
            {
                header('location:../viewEmployees.php');
            }else
            {
                $_SESSION['errors'] =['Error storing in Database'] ;
                header('location:../addEmployee.php');
            }

    }else
    {
        $_SESSION['errors'] =$erorrs ;
        header('location:../addEmployee.php');

    }

}else{
    header('location:../addEmployee.php');
}

?>