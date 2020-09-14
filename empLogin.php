<?php 
require_once 'inc/header.php';
require_once 'navbar.php';

?>




<div class="loginbox">




<div>
                            <?php if(isset($_SESSION['errors'])) {?>
                                      <div class='alert alert-danger'>
                                          <?php foreach ($_SESSION['errors'] as $erorr) {?>
                                            <p class='mb-1 text-center'><?php echo $erorr; ?></p>
                                          <?php }?>
                                      </div>

                                <?php  } ?>


                                        <?php unset($_SESSION['errors']) ;?>
</div>



    <img src="assets/avatar.png" class="avatar">
        <h1>Login Here</h1>
        <form action="handlers/handelEmpLogin.php" method="POST">
            <p>Email</p>
            <input type="text" name="email" placeholder="Enter Email Address" required="required">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required="required">
            <input type="submit" name="login-submit" value="Login">
        </form>   
</div>


<?php require_once 'inc/footer.php'; ?>