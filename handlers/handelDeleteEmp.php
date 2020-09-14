<?php

session_start();
require_once '../Classes/Employees.php';

if (!isset($_SESSION['id'])) {
  
    header('location:../index.php');
    die();
  }
    
    //read data from form 
    $id=$_GET['id'];

        //Delete
        $emp=new Employees;
        $result=$emp->delete($id);

            if($result == true)
            {

            }else
            {
                
            }
            header('location:../viewEmployees.php');


?>