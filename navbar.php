<?php 
require_once 'Classes/Employees.php';
$employees_img=new Employees;
 if (isset($_SESSION['id'])){ 
	$emp_id=$_SESSION['id'];
	$employee_img=$employees_img->getOne($emp_id);

 }


?>

<header>
		<nav>
			<h1>Company Name</h1>

			<?php if (isset($_SESSION['name'])){ ?>

			
			<h1><img src="images/<?php echo $employee_img['pic'] ?>" class="rounded-circle" width="35px" height="35px" alt=""> <?php echo $employee_img['name'] ?> </h1>

			<?php } ?>

			<ul id="navli">



			<?php if (!isset($_SESSION['id'])){ ?>

				<li><a class="homered" href="index.php">HOME</a></li>
				<li><a class="homeblack" href="empLogin.php">Employee Login</a></li>
				<li><a class="homeblack" href="admLogin.php">Admin Login</a></li>

				<?php } ?>


				<?php if (isset($_SESSION['email'])){ ?>

				<li><a class="homeblack" href="allTasks.php">All Tasks</a></li>
				<li><a class="homeblack" href="viewEmployees.php">View employees</a></li>

				<?php } ?>

				<?php if (isset($_SESSION['name'])){ ?>

				<li><a class="homeblack" href="myTasks.php">My tasks</a></li>
				<li><a class="homeblack" href="chat.php">Chat</a></li>
				<li><a class="homeblack" href="myProfile.php">Profile</a></li>


				<?php } ?>

				<?php if (isset($_SESSION['id'])){ ?>

				<li><a class="homeblack" href="handlers/handelLogout.php">logout</a></li>
				<?php } ?>


			</ul>
		</nav>
</header>

<div class="divider"></div>