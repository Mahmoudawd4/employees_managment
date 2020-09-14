<?php
require_once 'Connection.php';
class Task extends Conn {

    //get all
    public function getAll()
    {
        $qury='SELECT * FROM tasks';
        
       $result=$this->connect()->query($qury);
        $Tasks=[];
       if($result->num_rows >0)
       {
           while ($row =$result->fetch_assoc()) {
              
            array_push($Tasks,$row);

           }

       }

       return $Tasks;
        

    } 
        //get all
        public function getShow()
        {
            $qury="SELECT tasks.emp_id , tasks.task_id , employees.name , tasks.task_name ,tasks.desc ,tasks.status ,tasks.deadline 
            from tasks JOIN employees
            ON emp_id = id";
            
           $result=$this->connect()->query($qury);
            $Tasks=[];
           if($result->num_rows >0)
           {
               while ($row =$result->fetch_assoc()) {
                  
                array_push($Tasks,$row);
    
               }
    
           }
    
           return $Tasks;
            
    
        } 
    
     //get getEmpOnId
     public function getEmpOnId($task_id)
     {
         $qury="SELECT tasks.emp_id , employees.name
         from tasks JOIN employees
         ON emp_id = id
         WHERE tasks.task_id ='$task_id'";
         
        $result=$this->connect()->query($qury);
         $Tasks=[];
        if($result->num_rows >0)
        {
            while ($row =$result->fetch_assoc()) {
               
             array_push($Tasks,$row);
 
            }
 
        }
 
            return $Tasks;
         
 
     } 


    //get one

    public function getOne($id)
    {
        $qury="SELECT *
        FROM tasks
        WHERE task_id ='$id'";
        $Tasks=null;
        $result = $this->connect()->query($qury);

        if ($result->num_rows == 1)
        {
            # code...
            $Tasks=$result->fetch_assoc();
        }
        return $Tasks;

    }
        //get emp

        public function getEmp($id)
        {
            $qury="SELECT *
            FROM tasks
            WHERE emp_id ='$id'";
            $Tasks=[];
            $result = $this->connect()->query($qury);
    
            if($result->num_rows >0)
            {
                while ($row =$result->fetch_assoc()) {
                   
                 array_push($Tasks,$row);
     
                }
     
            }
     
            return $Tasks;
    
        }



    //creat new 

    public function store(array $data)
    {

        $qury="INSERT INTO tasks (`emp_id`, `task_name` ,`desc`, `status` ,`deadline`) 
        VALUES ('{$data['emp_id']}','{$data['task_name']}','{$data['desc']}','{$data['status']}','{$data['deadline']}')";

        $result=$this->connect()->query($qury);

        if($result == true)
        {
            return true ;
            
        }
       
            return false ;
            

    }

        //updata 


    public function updata($id,array $data)
    { 
        
        
        $qury="UPDATE tasks
         SET 
         `emp_id`= '{$data['emp_id']}',
         `task_name`='{$data['task_name']}',
         `desc`='{$data['desc']}' ,
         `status`='{$data['status']}' ,
         `deadline`='{$data['deadline']}' 
        WHERE task_id ='$id'
        ";

     $result=$this->connect()->query($qury);
     if($result == true)
     {
         return true ;
     }

     return false ;

    }

            //updata stuts


            public function updataInPro($id)
            { 
                
                
                $qury="UPDATE tasks
                SET 
                `status`='in process'
               WHERE task_id ='$id'
               ";
        
             $result=$this->connect()->query($qury);
             if($result == true)
             {
                 return true ;
             }
        
             return false ;
        
            }

                 //updata stutus

       public function updataComp($id)
       { 
           
           
           $qury="UPDATE tasks
            SET 
            `status`='completed'
           WHERE task_id ='$id'
           ";
   
        $result=$this->connect()->query($qury);
        if($result == true)
        {
            return true ;
        }
   
        return false ;
       }




    //updata Task

    public function updataTask($id ,array $data)
    { 
        
        
        $qury="UPDATE tasks
         SET 
         `emp_id`= '{$data['emp_id']}' ,
         `task_name`='{$data['task_name']}',
         `deadline`='{$data['deadline']}'
        WHERE task_id ='$id'
        ";

     $result=$this->connect()->query($qury);
     if($result == true)
     {
         return true ;
     }

     return false ;



    }
  

    //Delete task 

    public function delete($id )
    {
        $qury="DELETE FROM tasks
        WHERE  task_id='$id'";

    $result=$this->connect()->query($qury);
     if($result == true)
     {
         return true ;
     }

     return false ;

    }


}


    














?>