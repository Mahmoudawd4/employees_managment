<?php 
require_once 'inc/header.php';
require_once 'navbar.php';
require_once 'Classes/Employees.php';


$emp=new Employees;
$id=$_SESSION['id'];
$emps=$emp->getOne($id);
if (!isset($_SESSION['id'])) {
  
    header('location:../login.php');
    die();
  }  
  

?>


<!-- <form id = "registration" action="edit.php" method="POST"> -->
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    
                    <form method="POST" action="handlers/handleMyProfile.php?id=<?php echo $id?>" enctype="multipart/form-data" >

                        <div class="input-group ">
                        <h2 class="title" >My Info</h2>
                        </div>

                        <div class="input-group">
                            <img class="title rounded-circle" src="images/<?php echo $emps['pic']?>" width="100px" height="100px">
                        </div>


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




                        <div class="input-group">
                        <p>Name</p>
                            <input class="input--style-1" type="text"  name="name" value="<?php echo $emps['name']?>">
                        </div>


                        <div class="input-group">
                          <p>Email</p>
                            <input class="input--style-1" type="email"  name="email" value="<?php echo $emps['email']?>" >
                        </div>

                        <div class="input-group">
                          <p>Password</p>
                            <input class="input--style-1" style="color: #666;" type="password"  name="password" value="<?php echo $emps['password']?>" >
                        </div>
                        
                        <div class="row row-space">
                            <div class="col-5">
                                <div class="input-group">
                                  <p>City</p>
                                    <input class="input--style-1" type="text" name="city" value="<?php echo $emps['city']?>" >
                                   
                                </div>
                            </div>

                            <div class="input-group col-5">
                            <div class="rs-select2 js-select-simple select--no-search">
                            <p>gender</p>
                                <select name="gender">
                                    <?php if($emps['gender']  == 'male') {?>
                                        <option selected="selected" value="<?php echo 'male' ?>">male</option>
                                        <option value="<?php echo 'female' ?>" >female</option> 
                                           <?php }elseif($emps['gender']  == 'male'){?>
                                            <option value="<?php echo 'male' ?>">male</option>
                                            <option selected="selected" value="<?php echo 'female' ?>" >female</option> 
                                           <?php }?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        </div>
                        
                        <div class="input-group">
                          <p>Phone Number</p>
                            <input class="input--style-1" type="number" name="phone" value="<?php echo $emps['phone']?>" >
                        </div>

                        <div class="input-group">
                        <p>birthday</p>
                            <input class="input--style-1" type="date"  name="birthday" value="<?php echo $emps['birthday']?>" >
                        </div>


                        <div class="input-group">
                            <p>Picture</p>
                            <input class="input--style-1" type="file" name="pic">
                        </div>



                        <input type="hidden" name="id" id="textField" value="" required="required"><br><br>


                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green"  name="submit" >Update Info</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>



<?php require_once 'inc/footer.php'; ?>


