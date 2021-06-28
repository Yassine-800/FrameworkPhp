<?php

//  En gros cette classe va permettre de savoir automatiquement quel controller on veut appeler
// et quelle tâche on veut appeler
class App {
    public static function process() {

        // On définit le controller que l'on veut appelé et la tâche que l'on veut appelée sur ce controller
        $controllerName = "home";
        $task = "index";

        if(!empty($_GET['controller'])){
            $controllerName = $_GET['controller'];
    }
        if(!empty($_GET['task'])){
            $task = $_GET['task'];
        }

        $controllerName = ucfirst($controllerName);

        
     $controllerName = "\Controllers\\".$controllerName;
     // 
     $controller = new $controllerName();
     //
     $controller->$task();
    }
}