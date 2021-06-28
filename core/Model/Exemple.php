<?php
 
namespace Model;

// Imaginons que le fichier se nomme Annonce.php
 
class Annonce extends Model  
// extends Model (héritage) afin de pouvoir utiliser les propriétés et les méthodes d'une autre classe (ici la classe Model)
{

protected $table = "annonces";

        /**
         * trouve toutes les annonces liées à un garage
         * par ce meme garage
         * 
         * @param integer $garage_id
         * @return array|bool
         * 
         */

         // on met la fonction public pour que lorsqu'on utilise cette classe on puisse utiliser cette méthode

        public function findAllByGarage(int $garage_id)
        {

        

          $resultat =  $this->pdo->prepare('SELECT * FROM annonces WHERE garage_id = :garage_id');
          $resultat->execute(["garage_id"=> $garage_id]);
          
          $annonces = $resultat->fetchAll();
          return $annonces;
        }


        /**
         * ajoute une annonce
         * 
         * @param string $name
         * @param int $price
         * @param int $garage_id
         * @return void
         */

         // Vu qu'on est mieux organisé et qu'on sait que toutes les requêtes dans ce fichier concerne les annonces 
         // on appelle par exemple cette méthode insert au lieu de insertAnnonce
        public function insert(string $name, int $price, int $garage_id) : void
        {
        
          $maRequeteSaveAnnonce = $this->pdo->prepare("INSERT INTO {$this->table} (name, price, garage_id) 
          VALUES (:name, :price, :garage_id)");

            $maRequeteSaveAnnonce->execute([
            'name' => $name,
            'price' => $price,
            'garage_id' => $garage_id

            ]);
        }

}