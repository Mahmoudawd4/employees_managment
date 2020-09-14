<?php
session_start();
require_once '../Classes/Employees.php';
require_once '../Classes/helpers/Image.php';
require_once '../Classes/validation/validator.php';

use helpers\Image;
use validation\Validator;
if (!isset($_SESSION['id'])) {
  
    header('location:../index.php');
    die();
  }

//if form is submeted 
if (isset($_POST['submit'])) {
    
    //read data from form 
    $id=$_GET['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $birthday=$_POST['birthday'];
    $pic=$_FILES['pic'];


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

    ///////////////////////////////////////////////////////

    //validition

    /*
    $v=new Validator;
    $v->rules('name' ,$name ,['required' ,'string' , 'Max:100']);
    $v->rules('email' ,$email ,['required' ,'Email']);
    $v->rules('password' ,$password ,['required' ,'password']);
    $v->rules('city' ,$city ,['required' ,'string' , 'Max:100']);
    $v->rules('gender' ,$gender ,['required']);
    $v->rules('phone' ,$phone ,['required' ,'phone']);
    $v->rules('birthday' ,$birthday ,['required' ,'date']);
    $v->rules('pic' ,$pic ,['image']);
    $erorrs=$v->errors;
*/
$erorrs=array();
$valid=true;

    $imagName=$pic['name'];
    $imagtype=$pic['type'];
    $tmpName=$pic['tmp_name'];
    $targetFolder="images/";
    $imagName=time()."_route_".time().$imagName;
    $path=$imagName;
    //move_uploaded_file($tmpName,$path);
    //move_uploaded_file($tmpName,"../images/".$path);
    if(move_uploaded_file($tmpName,"../images/".$path)==false)
    {
        $err['pic']= "Sorry, pic not uploded sucssfuly";
        $valid=false;
    }
    if(file_exists($path)) {
        $err['pic']= "Sorry, file already exists.";
        $valid=false;
    }

    if(!is_string($name))
    {   
        $erorrs['name']= "must be string ";
        $valid=false;
    

    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $erorrs['email']= "not valid email";
        $valid=false;
    
    }
    if(empty($password)||strlen($password <= 8))
    {
        $erorrs['password']="password not vlaid";
        $valid=false;
    }
    if(!is_string($city))
    {   
        $erorrs['city']= "must be string ";
        $valid=false;
    

    }
    if(!is_string($gender))
    {   
        $erorrs['gender']= "must be string ";
        $valid=false;
    

    }

    if(!preg_match("/^01[0-2]{1}[0-9]{8}$/" , $phone))
    {
        $erorrs['phone']="phone not vlaid";
        $valid=false;
    }if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$birthday))
    {   
        $erorrs['birthday']="is not valid data";
        $valid=false;

    }


    //if is data falid
    if ($valid===true) {

    //$image =new Image($pic);
    //'pic' => $image->new_name;

    

        $data = [
            'name' => $name ,
            'email' => $email ,
            'password' => $password ,
            'city' => $city ,
            'gender' => $gender ,
            'phone' => $phone ,
            'birthday' => $birthday ,
            'pic' => $path
        ];
        
        //store
        $emp=new Employees;
        $result=$emp->updata($id,$data);

            // if stored sucssesfuly
            if($result == true)
            {
                //$image->uplodeImg();
                move_uploaded_file($tmpName,"../images/".$path);

                

                header('location:../myProfile.php');
            }else
            {
                $_SESSION['errors'] =['Error storing in Database'] ;
                header('location:../myProfile.php');
            }

    }else
    {
        $_SESSION['errors'] =$erorrs ;
        header('location:../myProfile.php');

    }

}else{
    header('location:../myProfile.php');
    
}

?>