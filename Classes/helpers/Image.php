<?php


namespace helpers;


class Image{


    public $name;
    public $tmp_name;
    public $new_name;
    public function __construct($img) {
        $this->name = $img['name'];
        $this->tmp_name = $img['tmp_name'];
        $ext= pathinfo($this->name)['extension'];
        $this->new_name = uniqid().'.'. $ext;
    }

    

    public function uplodeImg()
    {
        move_uploaded_file($this->tmp_name,'../images/'.$this->new_name);
    }


}









?>