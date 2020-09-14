<?php 
require_once 'inc/header.php';
require_once 'navbar.php';
require_once 'Classes/Employees.php';
require_once 'Classes/Task.php';
if (!isset($_SESSION['id'])) {
  
    header('location:../login.php');
    die();
  }  

$emp=new Employees;
$tasks=new Task;
$id=$_GET['task_id'];
$task=$tasks->getOne($id);
$taskemp=$tasks->getEmpOnId($id);

?>


    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title text-center mb-4">Project Info</h2>


                    
                    <div class="container my-5">
                            <?php if(isset($_SESSION['errors'])) {?>
                                      <div class=' alert alert-danger'>
                                          <?php foreach ($_SESSION['errors'] as $erorr) {?>
                                            <p class='mb-1 text-center'><?php echo $erorr; ?></p>
                                          <?php }?>
                                      </div>

                                <?php  } ?>


                                        <?php unset($_SESSION['errors']) ;?>
                    </div>




                    <form action="handlers/handleUpdateTask.php?task_id=<?php echo $task['task_id'] ?>" method="POST" >

                        
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="emp_id">
                                    <?php
                                    foreach ($taskemp as $row) {?>

                                         <option selected="selected" value="<?php echo $row['emp_id'] ?>"><?php echo $row['name'] ?></option>

                                    <?php } ?>

                                    <?php
                                    foreach ($emp->getAll() as $row) {?>

                                         <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>

                                    <?php } ?>
                                    
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Project name" value="<?php echo $task['task_name'] ?>" name="task_name">
                        </div>

                        <div class="form-group">
                            <label style="color: #666;" for="exampleFormControlTextarea1" ">Description</label>
                            <textarea class="form-control" name="desc" rows="3" ><?php echo $task['desc'] ?></textarea>
                        </div>

                       
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="status">
                                    <?php if($task['status']  == 'in process') {?>
                                        <option selected="selected" value="<?php echo 'in process' ?>">in process</option>
                                        <option value="<?php echo 'completed' ?>" >completed</option> 
                                           <?php }elseif($task['status']  == 'completed'){?>
                                            <option value="<?php echo 'in process' ?>">in process</option>
                                            <option selected="selected" value="<?php echo 'completed' ?>" >completed</option> 
                                           <?php }?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        <div class="input-group">
                            <input class="input--style-1" style="color: #666;" type="date" placeholder="Deadline" name="deadline" value="<?php echo $task['deadline'] ?>">
                        </div>
                                          

                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" name="submit" type="submit">Updata Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php require_once 'inc/footer.php'; ?>