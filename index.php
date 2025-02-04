<?php
require_once 'Controller/UserController.php';

$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$segments = explode('/', $url);
$controller = $segments[2] ;
echo $controller;
$lastSegment = end($segments); 

class Route {
    private $controller;
    public function __construct(){
        $this->controller = new UserController();
    }
    
    public function runAction($action, $id){    
        $validActions = [ 'delete', 'update']; 
        if (in_array($action, $validActions)) {
            $this->controller->$action($_GET["id"]);
        } else {
          return  $this->controller->read($id);  
        }
    }
    
    public function getAction($action, $id){

        $result =  $this->runAction($action, $id);
      

    }
}

$route = new Route();

if(isset($_GET["action"])){
    $action = $_GET["action"];
} else {
    $action = "home";
}
$route->getAction($action, $lastSegment);
