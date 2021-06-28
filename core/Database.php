<?php

class Database {

/**
 * 
 * Retourne une connexion à la base de données
 * @return PDO 
 * 
 */

public static function getPdo() {
    
    $pdo = new PDO('mysql:host=localhost:3308;dbname=garages','garage' ,'garage', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  ,
        PDO::ATTR_DEFAULT_FETCH_MODE  =>    PDO::FETCH_ASSOC          
        ]);

 // Pour que le travail soit exploitable il faut qu'on renvoie le résultat du travail 
        
    return $pdo;
        }
    }


    // Donc maintenant dans tous les fichiers ou on utilisait $pdo = new PDO on 
    // peut simplement y remplacer par $pdo = getPdo();
    // sans oublier de faire le require_once du fichier database.php







