<?php

include_once 'model/user.php';
include_once 'config/Database.php';

class UserController {
    private  $user;
    public function __construct(){
   
        $this->user = new User(null, null);
    }


public function read($id){
    
    $result =  $this->user->read($id);
    if(!$result){
        require_once 'View/page404.php';
       }else{

           require_once 'View/patient.php';
       }    

}
public function delete($id){
   
    
     $this->user->delete($id);
}
}
