<?php
require_once 'Controller/UserController.php';

$url = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$segments = explode('/', $url);
$lastSegment = end($segments); // Récupère le dernier segment (ID)

class Route {
    private $controller;
    
    public function __construct(){
        $this->controller = new UserController();
    }
    
    public function runAction($action, $id){
        echo "hh";
    
        $validActions = ['read', 'delete', 'update'];  // Liste des actions valides
        if (in_array($action, $validActions)) {
            $theAction = $action . 'Controller';
            $this->controller->$theAction($_GET["id"]);
        } else {
          $result =  $this->controller->readController($id);  
          require_once 'View/patient.php';

        }
    }
    
    public function getAction($action, $id){

        $this->runAction($action, $id);
        require_once 'View/patient.php';

    }
}

$route = new Route();
$route->getAction($_GET['action'], $lastSegment);
