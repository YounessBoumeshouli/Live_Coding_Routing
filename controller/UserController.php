<?php

include_once 'model/user.php';
include_once 'config/Database.php';

class UserController {
    public $db;
    public function __construct(){
        $this->db = Database::getInstance();
    }


public function readController($id){
    $user = new User($this->db, null);
    
    return $user->read($id);
}
public function deleteController($id){
    $user = new User($this->db, null);
    
    return $user->delete($id);
}
}
