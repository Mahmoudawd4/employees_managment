<?php

session_start();
require_once '../Classes/Task.php';
require_once '../Classes/validation/validator.php';
use validation\Validator;

if (!isset($_SESSION['id'])) {
  
    header('location:../index.php');
    die();
  }



//if form is submeted 
if (isset($_POST['submit'])) {
    
    //read data from form 
    $id=$_GET['task_id'];
    $emp_id=$_POST['emp_id'];
    $task_name=$_POST['task_name'];
    $deadline=$_POST['deadline'];


            //prperfunction clean Data 
            function preper($input)
            {
                return trim(htmlspecialchars($input));
            }
        
            $emp_id=preper($emp_id);
            $task_name=preper($task_name);
            $deadline=preper($deadline);
        


        //validition
        $v=new Validator;
        $v->rules('emp_id' ,$emp_id ,['required' ,'numaric' ]);
        $v->rules('task_name' ,$task_name ,['required' ,'string' , 'Max:100']);
        $v->rules('deadline' ,$deadline ,['required' ,'date']);
        $erorrs=$v->errors;
    




    //if is data falid
    if ($erorrs == []) {


        $data = [
            'emp_id' => $emp_id ,
            'task_name' => $task_name ,
            'deadline' => $deadline
        ];
        
        //updata
        $task=new Task;
        $result=$task->updataTask($id,$data);

            // if stored sucssesfuly
            if($result == true)
            {
                header('location:../allTasks.php');
            }else
            {
                $_SESSION['errors'] =['Error storing in Database'];

            }

    }else
    {
        $_SESSION['errors'] =$erorrs ;
        header("location:../assignTask.php?task_id=".$id);

    }

}else{
    header("location:../assignTask.php?task_id=".$id);
}

?>