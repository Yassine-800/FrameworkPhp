<?php

class Rendering {

/**
 * 
 * Fonction qui génère le rendu de données interpolées
 * dans un template
 * 
 * @param string $template
 * @param array $donnees
 * 
 */

 // Une méthode static est une méthode qui appartient à la classe elle-même (donc pas besoin de créer un objet d'une classe appeler cette méthode )
 // Donc par exemple maintenant si on veut appeler la méthode render on peut faire \Rendering::render (voir Home.php du dossier Controllers ligne 31)

public static function render(string $template, array $donnees): void {

   extract($donnees);

   ob_start();

   require_once "templates/".$template.".html.php";

   $contenuDeLaPage = ob_get_clean();

   require_once "templates/layout.html.php";


}

    
}