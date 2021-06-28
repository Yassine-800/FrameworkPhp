<?php

// 
namespace Controllers;


class Home //extends Controller si besoin d'un model
{
    //  protected $modelName; si besoin d'un model


    /**
     * affiche l'accueil du framework
     * 
     * 
     */
    public function index()
    {
        $titreDeLaPage = "Accueil Framework";

         $message = "Bienvenue dans la documentation du fram";

         $messageQuiChange = "Changez moi grace au formulaire";

         if(!empty($_POST['messageQuiChange'])){
              $messageQuiChange = $_POST['messageQuiChange'];
         }

        // render un template
        // Vu qu'on est dans le namespace Controllers si on ne met pas \ devant Rendering
        // sa va chercher une classe Rendering dans le namespace des Controllers 
        \Rendering::render('home/home', compact('titreDeLaPage', 'message', 'messageQuiChange'));


    }

   



}