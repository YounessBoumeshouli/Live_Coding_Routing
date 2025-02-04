<?php
require_once 'Controller/UserController.php';

$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$segments = explode('/', $url);
$lastSegment = end($segments); 
class Route {
    private $controller;
    
    public function __construct(){
        $this->controller = new UserController();
    }
    
    public function runAction($action, $id){    
        $validActions = ['read', 'delete', 'update']; 
        if (in_array($action, $validActions)) {
            $theAction = $action . 'Controller';
            $this->controller->$theAction($_GET["id"]);
        } else {
          return  $this->controller->readController($id);  

        }
    }
    
    public function getAction($action, $id){

        $result =  $this->runAction($action, $id);
       if($result){
        require_once 'View/patient.php';

       }else {
        require_once 'View/page404.php';
       }

    }
}

$route = new Route();

if(isset($_GET["action"])){
    $action = $_GET["action"];
} else {
    $action = "home";
}
$route->getAction($action, $lastSegment);
