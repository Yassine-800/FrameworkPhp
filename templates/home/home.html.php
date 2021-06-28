<p>coucou je suis home</p>

<h3><?php echo $message ?></h3>

<form action="index.php" method="post">

<input class="m-5" name="messageChanger" type="text" placeholder="Entrer ici votre  message"> 

<button class="btn btn-success" type="submit">Envoyer</button>


</form>
<div class="container">

    <h2>Avant la POO</h2>
        <p>Une bonne organisation grâce aux fonctions</p>
        <p>Au départ dans le fichier index.php :</p>
    <div>
        <p class="red">
        <strong>  1) Connexion à la base de données avec PDO </strong> <br>
            On précise deux options: <br>
            - Le mode erreur : le mode exception permet à PDO de nous prévenir quand on fait une dinguerie <br>
            - Le mode d'exploitation : FETCH_ASSOC : on exploite les données sous la forme de tableaux associatifs <br>
        </p>
        <p>
        $pdo = new PDO ('mysql:localhot:3308;dbname=nomDeLaBDD','nomDuUser','MotDePasseDuUser', [ <br>
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, <br>
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC <br>
        ]);
        </p>
    </div>
    <div>
        <p class="red">
        <strong> 2) Requête sql </strong> <br>
            Ici par exemple pour récupérer tout les garages <br>
            On utilise la méthode query (on ne prépare rien car aucune variable n'est utilisé)
        </p>
        <p>
        $resultat = $pdo->query("SELECT * FROM garages");
        </p>
        <p class="red">
        On fouille dans le résultat pour extraire les données réelles
        </p>
        <p>
        $voitures = $resultat->fetchAll();
        </p>
    </div>
    <div>
        <strong> 3) L'affichage </strong> <br>    
        <p>
    // On commence par déclarer une variable $titreDeLaPage <br>
        $titreDeLaPage = "Accueil"; <br>

    // Puis grâce à la fonction ob_start(); on dit à PHP qu'à partir de maintenant tout ce qu'on va afficher ne l'affiche pas réellement
     (en gros on ouvre un tampon qui coffre tout ce qu'on veut afficher) <br>
        ob_start(); <br>

    // Ensuite on demande a afficher ce qu'on veut mettre dans le tampon   <br>  
        require('templates/garages/garages.html.php'); <br>

    // Dans la variable $contenuDeLaPage on va mettre tout ce qui a été affiché dans le tampon grâce à ob_get_clean(); <br>
        $contenuDeLaPage = ob_get_clean(); <br>

    // Et finalement on demande a afficher notre layout.html.php <br>
        require('templates/layout.html.php'); <br>
    
    // Dans garages.html.php on a le corps de notre page (voir le fichier garages.html.php), <br>
    Et vu que nos 2 variables $titreDeLaPage et $contenuDeLaPage sont dans layout.html.php c'est comme ci on avait un template qui s'affiche dans un autre template

        </p>
    </div>        
        <div>
        Pour éviter de nous répeter, par souci d'évolutivité et de gestion des erreurs on factorise notre code <br>
         (on le met a un endroit particulier pour pouvoir l'utiliser à d'autres endroits)
        </div>
        <div>
        <strong>Meilleure organisation du code grâce à la POO</strong>
            <p>
            On commence par créer un dossier Model <br>
            Les modèles de données pour accéder aux données (model)
            nous servent a regrouper les fonctions dans chaque fichier pour être mieux organisé <br>
            (voir les fichiers Exemple.php et Model.php dans le dossier Model)
            </p>        
        </div>
        <div>
            <p>
            Maintenant on s'occupe des interactions avec l'utilisateur <br>
            Ce qu'on appelle action c'est une réponse a une demande de l'utilisateur <br>
            (exemple: le user clique sur un bouton pour demander une certaine page ) <br>
            On crée un nouveau dossier Controllers <br>
            En général on range les actions par domaine (garage, annonce, gateau, recette, ...) <br>
            (voir le fichiers Exemple.php et Controllers.php dans le dossier Controllers)
            </p>
        </div>
        <div>
            <p>
            Maintenant on s'occupe des require_once qu'on utilise trop souvent grâce à l'autoloading <br>
            (voir le fichier autoloading.php)
            </p>
        </div>
        <div>
            <p>
            Les méthodes statiques <br>
            (Database.php / Http.php / Rendering.php)
            </p>
        </div>
        <div>
            <p>
            Pour éviter d'avoir une tonne de templates différents selon chaque action <br>
             (exemple: deleteAnnonce.php / deleteGarage.php / createGarage.php ...) <br>            
            Puisqu'à chaque fois on fait la même chose on appele un controller, on l'instancie <br>
             et on appele la fonction qui correspond a ce qu on veut faire. <br>
             Donc ce code on peut le faire qu'une seule fois  <br>
              (voir le fichier App.php)
            </p>
        </div>

</div>