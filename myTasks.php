<?php 
require_once 'inc/header.php';
require_once 'navbar.php';
require_once 'Classes/Employees.php';
require_once 'Classes/Task.php';
$task=new Task;
$id=$_SESSION['id'];
//$task_id=$task->getAll();
$tasks=$task->getEmp($id);
if (!isset($_SESSION['id'])) {
  
    header('location:../login.php');
    die();
  }  
  


?>

    <h2 class="task_title" >Empolyee Leaderboard</h2>
      
    
    <table>

			<tr bgcolor="#000">
				<th align = "center">Emp_id</th>
                <th align = "center">Task_name</th>
                <th align = "center">Desc</th>
				<th align = "center">Status</th>
                <th align = "center">Deadline</th>
                <th align = "center">Action</th>

				
            </tr>

            <?php if ($tasks !== []) { ?>
            <?php foreach ($tasks as $task) {?>
            
            <tr >
                <td><?php echo $task['emp_id'] ?></td>
                <td><?php echo $task['task_name'] ?></td>
                <td><?php echo $task['desc'] ?></td>
                <td><?php echo $task['status'] ?></td>
                <td><?php echo $task['deadline'] ?></td>
                <?php if($task['status'] == 'completed'){?>
                <td>
                    <form action="action/handelAction.php?task_id=<?php echo $task['task_id']?>" method="POST">
                    <button act class="btn btn-danger" name="Back">back</button>
                    </form>
                </td>
                <?php }elseif($task['status'] == 'in process'){ ?>
                <td>
                    <form action="action/handelAction.php?task_id=<?php echo $task['task_id']?>" method="POST">
                    <button act class="btn btn-primary" name="Done">Done</button>
                    </form>
                </td>
                <?php } ?>

            </tr>
            
            <?php }?>

<?php }?>

	</table>



<?php require_once 'inc/footer.php'; ?>