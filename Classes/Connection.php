<?php


class Conn{

    public $servername,$db_username ,$db_password,$db_name;

    public function connect(){

        $this->servername='localhost';
        $this->db_username='root';
        $this->db_password='';
        $this->db_name='employee_system';

        return new mysqli( $this->servername , $this->db_username ,$this->db_password,  $this->db_name);

    }

}

?>