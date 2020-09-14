<?php 
require_once 'inc/header.php';
require_once 'navbar.php';
require_once 'Classes/Employees.php';
$emp=new Employees;
$Employees=$emp->getAll();

if (!isset($_SESSION['id'])) {
  
    header('location:../login.php');
    die();
  }  
  
?>
    
    <h2 class="task_title" >Empolyees</h2>
    <h3 class="task_title"><a class="btn btn-info m-3" href="addEmployee.php">Add new employee</a></h3>

		<table>

                <th align = "center">Emp.ID</th>
                <th align = "center">Pic</th>
				<th align = "center">Name</th>
                <th align = "center">Email</th>
                <th align = "center">City</th>
				<th align = "center">Birthday</th>
                <th align = "center">Gender</th>
                <th align = "center">phone</th>

                <th align = "center">Options</th>
                
			</tr>

            <?php if ($Employees !== []) { ?>
            <?php foreach ($Employees as $employee) {?>
                <tr>
                <td><?php echo $employee['id'] ?></td>
                <td><img class="rounded-circle" height="80px" width="80px" src="images/<?php echo $employee['pic'] ?>" alt=""></td>
                <td><?php echo $employee['name'] ?></td>
                <td><?php echo $employee['email'] ?></td>
                <td><?php echo $employee['city'] ?></td>
                <td><?php echo $employee['birthday'] ?></td>
                <td><?php echo $employee['gender'] ?></td>
                <td><?php echo $employee['phone'] ?></td>

                <td>
                       
                        <a class="btn btn-danger btn-sm" href="handlers/handelDeleteEmp.php?id=<?php echo $employee['id'] ?>">Delete</a>                </td>
                </tr>

                <?php }?>

            <?php }?>


		</table>

        
<?php require_once 'inc/footer.php'; ?>
