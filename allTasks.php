<?php 
require_once 'inc/header.php';
require_once 'navbar.php';
require_once 'Classes/Task.php';
require_once 'Classes/Employees.php';
$task=new Task;
$tasks=$task->getShow();

?>

    <h2 class="task_title" >Empolyee Leaderboard</h2>
    <h3 class="task_title"><a class="btn btn-info m-3" href="addTask.php">Add new task</a></h3>
      
    <table class="table table-sm">

			<tr bgcolor="#000">
				<th align = "center">emp_id</th>
				<th align = "center">emp_name</th>
                <th align = "center">Task_name</th>
                <th align = "center">Desc</th>
                <th align = "center">Status</th>
                <th align = "center">Deadline</th>
				<th align = "center">Actions</th>
            </tr>
            


            <?php if ($tasks !== []) { ?>
            <?php foreach ($tasks as $task) {?>
                <tr>
                <td><?php echo $task['emp_id'] ?></td>
                <td><?php echo $task['name'] ?></td>
                <td><?php echo $task['task_name'] ?></td>
                <td><?php echo $task['desc'] ?></td>
                <td><?php echo $task['status'] ?></td>
                <td><?php echo $task['deadline'] ?></td>
                <td>
                        <a class="btn btn-success btn-sm" href="updataTask.php?task_id=<?php echo $task['task_id'] ?>">Edit</a>
                        <a class="btn btn-danger btn-sm" href="handlers/handelDeleteTask.php?task_id=<?php echo $task['task_id'] ?>">Delete</a>
                        <a class="btn btn-primary btn-sm" href="assignTask.php?task_id=<?php echo $task['task_id'] ?>">Assign to</a>
                </td>
                </tr>

                <?php }?>

            <?php }?>

            

  </table>
  

<?php require_once 'inc/footer.php'; ?>
