<?php 
session_start();
require_once '../Classes/Task.php';


$tasks=new Task;
$id=$_GET['task_id'];


if (isset($_POST['Back']))
{
   $task=$tasks->updataInPro($id);
}

if (isset($_POST['Done']))
{
  $task=$tasks->updataComp($id);
}

header("location:../myTasks.php");
?>
