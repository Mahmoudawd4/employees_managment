<?php
require_once 'Connection.php';

class Employees extends Conn{



        //get all
        public function getAll()
        {
            $qury='SELECT * FROM employees';
            
           $result=$this->connect()->query($qury);
            $Emp=[];
           if($result->num_rows >0)
           {
               while ($row =$result->fetch_assoc()) {
                  
                array_push($Emp,$row);
    
               }
    
           }
    
           return $Emp;
            
    
        } 

        //get ont emp
        public function getOne($id)
        {
            $qury="SELECT *
            FROM employees
            WHERE id ='$id'";
            $Tasks=null;
            $result = $this->connect()->query($qury);
    
            if ($result->num_rows == 1)
            {
                # code...
                $Tasks=$result->fetch_assoc();
            }
            return $Tasks;
    
        }


        public function store(array $data)
        {
    
            $qury="INSERT INTO employees (`name`, `email` ,`password`, `phone` ,`city`,`gender`,`birthday`) 
            VALUES ('{$data['name']}','{$data['email']}','{$data['password']}','{$data['phone']}','{$data['city']}','{$data['gender']}','{$data['birthday']}')";
    
            $result=$this->connect()->query($qury);
    
            if($result == true)
            {
                return true ;
                
            }
           
                return false ;
                
    
        }

        // updata employee 

        public function updata($id,array $data)
        { 
            $qury="UPDATE employees
             SET 
             `name`= '{$data['name']}',
             `email`='{$data['email']}',
             `password`='{$data['password']}' ,
             `phone`='{$data['phone']}' ,
             `city`='{$data['city']}',
             `gender`='{$data['gender']}',
             `birthday`='{$data['birthday']}',
             `pic`='{$data['pic']}' 
            WHERE id ='$id'
            ";
    
         $result=$this->connect()->query($qury);
         if($result == true)
         {
             return true ;
         }
    
         return false ;    
    
        }

        //delete employee

        public function delete($id )
        {
            $qury="DELETE FROM employees
            WHERE  id='$id'";
    
        $result=$this->connect()->query($qury);
         if($result == true)
         {
             return true ;
         }
    
         return false ;
    
        }



}









?>