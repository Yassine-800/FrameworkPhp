<?php
// On enregistre une nouvelle façon d'appeler les classes avec la fonction spl_autoload_register
// Il faut comme paramètre une function qui a elle-même en paramètre un nom de classe ($nomDeClasse)
// 
spl_autoload_register(function($nomDeClasse){

    // La fonction str_replace est utilisé pour pouvoir changer les antislash en slash pour que le chemin
    // des require reste valide
    // En premier paramètre c'est ce que l'on veut remplacer, en deuxième c'est ce par quoi on y remplace
    // et en troisième paramètre c'est là ou on stocke tout cela
    
    $nomDeClasse = str_replace("\\", "/", $nomDeClasse);
    require_once "core/$nomDeClasse.php";
});