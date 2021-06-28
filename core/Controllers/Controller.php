<?php
namespace Controllers;

abstract class Controller {

    // cette variable sert a instancier la classe et nous évite de créer un nouveau $model dans toutes nos fonctions
    // protected pour qu'elle soit accessible dans toutes les sous classes
    protected $model;
    
    // La variable $modelName est déclarée dans le fichier Controller comme ça toute classe qui héritera du controller
    // devra juste préciser le nom de son controller via $modelName et celui-ci sera déjà instancié (prêt à être utilisé)
    // voir le fichier Exemple.php dans le dossier Controllers à la ligne 16
    protected $modelName;


    // methode qui est appelé automatiquement lors de l'instanciation d'une classe (mot clé new ) 
       public function __construct (){
           // Vu qu'on est dans le constructeur a chaque fois qu'on appelera une fonction le modèle existera
           // sans oublier de faire à chaque fois $this->model 
           // new $this->modelName(); fait référence à la variable $modelName
            $this->model = new $this->modelName();
        }
}

