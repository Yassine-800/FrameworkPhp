<?php
namespace Model;
// Ce fichier contient juste une classe qui a juste ce que tout les modèles doivent avoir

// require_once "core/database.php";

// Pour que la classe Model ne soit jamais appelé, jamais instancié on rajoute le mot-clé abstract
// En effet une classe abstraite ne peut pas être utilisée réellement sinon on aura
// Fatal error: Uncaught Error: Cannot instantiate abstract class Model

abstract class Model {

    //  protected pour pouvoir être utilisé dans les enfants également
protected $pdo;
    // On déclare la propriété $table comme ça en fonction de ce qu'elle aura comme valeur les requetes seront différentes ({$this->table})
    // mais la ou les propriétés restent communes pour toute classe qui souhaiterait la ou les utiliser ( gros avantage ;) )
protected $table;


// Le constructeur est appelé dès qu'on crée une instance d'une classe 
public function __construct() {

    // c'est pour sa que l'on dit que la variable pdo un peu plus haut (protected $pdo) est égal à getPdo() 
    $this->pdo = \Database::getPdo();
    }
// Grâce a cela maintenant à chaque fois que dans une fonction on veut faire appel à la base de données
// on a plus besoin d'écrire $pdo = getPdo() mais juste $this->pdo ...


/**
 *  
 * Fonction qui retourne un garage précis selon l'id précisé
 * en paramètre
 * renvoie un tableau contenant un garage ou un booleen si inexistant
 * 
 * @param integer $id
 * @return array|bool 
 * 
 */

public function find(int $id) {

    // on vérifie que ce que l'on veut existe 
  $maRequete = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id =:id");

  $maRequete->execute(['id' => $id]);

// on appelle la variable item pour pouvoir parler a n'importe quelle table
  $item = $maRequete->fetch();

  return $item;
}

/**
 * 
 * Fonction qui retourne un tableau qui contient tout
 * les garages de la table garages
 * @return array|bool
 * 
 */

public function findAll() : array {

    // méthode query car pas besoin de préparation ( liée à une variable) 

    $resultat =  $this->pdo->query("SELECT * FROM {$this->table}");
   
    // fetchAll pour fouiller le résultat et en extraire les données réelles

    $items = $resultat->fetchAll();

    return $items;
}


/**
 * Fonction qui supprime un garage via son id
 * @param integer $id
 * @return void
 */

public function delete(int $id): void{
    
    $maRequete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id =:id");

    $maRequete->execute(['id' => $id]);


}

// Toute classe qui hérite de Model pourra utiliser les méthodes présentes dans ce fichier

}