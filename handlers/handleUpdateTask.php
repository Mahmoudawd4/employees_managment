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
    $desc=$_POST['desc'];
    $status=$_POST['status'];
    $deadline=$_POST['deadline'];



        //prperfunction clean Data 
        function preper($input)
        {
            return trim(htmlspecialchars($input));
        }
    
        $emp_id=preper($emp_id);
        $task_name=preper($task_name);
        $desc=preper($desc);
        $status=preper($status);
        $deadline=preper($deadline);
    
    


    //validition
    $v=new Validator;
    $v->rules('emp_id' ,$emp_id ,['required' ,'numaric' ]);
    $v->rules('task_name' ,$task_name ,['required' ,'string' , 'Max:100']);
    $v->rules('desc' ,$desc ,['required' ,'string' ]);
    $v->rules('status' ,$status ,['required']);
    $v->rules('deadline' ,$deadline ,['required' ,'date']);
    $erorrs=$v->errors;




    //if is data falid
    if ($erorrs == []) {


        $data = [
            'emp_id' => $emp_id ,
            'task_name' => $task_name ,
            'desc' => $desc ,
            'status' => $status ,
            'deadline' => $deadline
        ];
        
        //updata
        $task=new Task;
        $result=$task->updata($id,$data);

            // if stored sucssesfuly
            if($result == true)
            {
                header('location:../allTasks.php');
            }else
            {
                $_SESSION['errors'] =['Error storing in Database'];
                header("location:../updataTask.php?task_id=".$id);


            }

    }else
    {
        $_SESSION['errors'] =$erorrs ;
        header("location:../updataTask.php?task_id=".$id);

    }

}else{
    header("location:../updataTask.php?task_id=".$id);
}

?>