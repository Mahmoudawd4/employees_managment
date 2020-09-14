<?php

require_once 'Connection.php';



class Admin extends Conn {
    public function attempt($email, $hashpassword)
    {
        $qury="SELECT * from admins 
        WHERE email ='$email' and `password` = '$hashpassword'";

        $result=$this->connect()->query($qury);
        $user=null;

        if($result->num_rows == 1 )
        {
            $user =$result->fetch_assoc();
        }

        return $user;
    }
}






?>