

        <h2><?php echo $garage['name']; ?></h2>

        <h3><?php echo $garage['address']; ?></h3>

        <h4><?php echo $garage['description']; ?></h4>

<a href="index.php" class="btn btn-primary">Retour aux garages</a>

<form action="index.php?controller=annonce&task=save" method="POST">
<input type="hidden" name="garageId" value="<?php echo $garage['id'] ?>">
        <div class="form-group">
        <textarea name="name" id="" cols="" rows="1"></textarea>
        </div>
        <div class="form-group">
        <textarea name="price" id="" cols="" rows="2"></textarea>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-success">Poster l'annonce</button>
        </div>
</form>

<?php if(empty($annonces)){
        echo "pas d'annonces pour l'instant";
}
?>
<?php

foreach($annonces as $annonce) {?>

<?php echo $annonce['name'];
echo "<br>"; 
echo $annonce['price'];
echo "€";
echo "<br>";
?>

<a href="deleteAnnonce.php?id=<?php echo $annonce['id'] ?>" class="btn btn-danger">Supprimer</a>

<?php echo "<hr>"; ?>



<?php }?>
