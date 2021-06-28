<?php

// On a maintenant deux classes nommées Exemple (une dans le dossier Model et l'autre dans le dossier Controllers)
// Pour éviter d'avoir une erreur du genre : Fatal error: cannot declare class ...., because the name is already in use
// on utilise les namespaces qui nous permet de ranger des classes du même nom dans des espaces différents 
// Donc a chaque fois qu'on utilise une des classes présentes dans le dossier Controllers ou Model il faudra préciser 
// de quel namespace on se sert avec un antislash devant (exemple ligne 64: $modelAnnonce = new \Model\Annonce(); )

namespace Controllers;



class Garage extends Controller
{   
    // on instancie la variable $modelName ppur lui donner une valeur et pouvoir l'utiliser dans la classe Garage
    protected $modelName = \Model\Garage::class;

    /**
     * afficher l'accueil du site
     * 
     * 
     */

    public function index(){


                    //on recupère tous les garages 
                    // cette ligne veut dire pour mes garages($garages) je vais demander a mon model ($this->model)
                    // de me trouver tout les garages(findAll)
                    $garages = $this->model->findAll($this->modelName);

                    //on fixe le titre de la page
                    $titreDeLaPage = "Garages";

                    //on affiche
                    \Rendering::render( "garages/garages" ,
                            compact('garages', 'titreDeLaPage')  
                        );

    }
  

    /**
     * 
     * afficher UN garage
     */
    public function show(){


                $garage_id = null;

                if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

                    $garage_id = $_GET['id'];
                }
                
                if(!$garage_id){
                    die("il faut absolument entrer un id dans l'url pour que le script fonctionne");
                }


               
                $garage = $this->model->find($garage_id);

                    
                $modelAnnonce = new \Model\Annonce();
                $annonces = $modelAnnonce->findAllByGarage($this->modelName);
  
                $titreDeLaPage = $garage['name'];

                \Rendering::render('garages/garage',
                        compact('garage', 'annonces','titreDeLaPage')       
                );
    }

    /**
     * 
     * supprimer un garage
     */

    public function suppr(){

        
            if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
                $garage_id = $_GET['id']; 
                }
            if(!$garage_id){
        
                die("il faut entrer un id valide en paramtre dans l'url");
                        }
                
            // on veut verifier que cet garage existe bien dans la base de données
            $garage = $this->model->find($garage_id);
            
            
            //si le garage n'existe pas
            if(!$garage){
                die("ce garage est inexistant");
            }
            // alors , faire la requete de suppression
            
            $this->model->delete($garage_id);
            
            \Http::redirect('index.php');

        }

}