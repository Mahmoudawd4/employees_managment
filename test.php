<?php

require_once './Classes/Task.php';
require_once './Classes/Employees.php';


$task=new Task;


/*
echo $task->updata(1,[
    'emp_id'=> 2 ,
    'task_name' => 'task1',
    'desc' => 'task1task1task1task1' ,
    'status' => 'completed' ,
    'deadline' => '2020-08-1' 
]);

*/
/*
echo $task->updataTask(3 ,[
    'emp_id'=> 1 ,
    'task_name' => 'task2',
    'deadline' => '2020-08-15'
]);
*/

//echo $task->delete(7);

//var_dump($task->getEmp(2));



$emp=new Employees;


//var_dump($emp->getOne(1));
/*
echo $emp->updata(10,[
    'name'=>'khaled',
    'email'=>'khaled@gmail.com',
    'password'=>'123456',
    'phone'=>'01004084962',
    'city'=>'sharqia',
    'gender'=>'male' ,
    'birthday' => '2020-08-20' ,
    'pic'=>'3.jpg'
]);
*/


//echo $emp->delete(6);
/*
$emp=new Task;
foreach ($emp->getEmpOnId() as $row) {
    echo $row['emp_id'] ;
}
*/

/*
 $tasks=$task->getEmpOnId(3) ;
foreach ($tasks as $task ) {
    # code...
   echo $task['name'];
   echo $task['emp_id'];

}

*/

//$tasks=$task->getOne(3) ;

//var_dump($tasks);


//$tasks=$task->getShow();
//var_dump($tasks);

/*
foreach ($tasks as $task) {
    echo $task['name'];
    echo $task['emp_id'];

}


*/


//$tasks=$task->updataAction(2,'in process');





?>

