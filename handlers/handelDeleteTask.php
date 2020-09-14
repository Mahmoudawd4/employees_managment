<?php

session_start();
require_once '../Classes/Task.php';

if (!isset($_SESSION['id'])) {
  
    header('location:../index.php');
    die();
  }
  
    
    //read data from form 
    $id=$_GET['task_id'];

        //Delete
        $task=new Task;
        $result=$task->delete($id);

            if($result == true)
            {

            }else
            {
                
            }
            header('location:../allTasks.php');


?>