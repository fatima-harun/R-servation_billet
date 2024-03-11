<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des réservations</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
<header>
     <div><img src="images\logo.png" alt="logo" class="logo"></div>
        <div class="navbar">
            <a href="">Destinations</a>
            <a href="">Itinéraires</a>
            <a href="">Réservations</a>
            <a href="">Se connecter</a>
            <a href="">Ouvrir un compte</a>
        </div>
</header>
<?php
require_once "connexion.php";
$sql_billet = "SELECT * FROM billet";
$billet = mysqli_query($conn, $sql_billet);
if (mysqli_num_rows($billet) > 0) {
    while ($row = mysqli_fetch_assoc($billet)) {
        $id_billet = $row['id_billet'];
        $depart = $row['lieu_de_depart'];
        $lieu_destination = $row['Lieu_de_destination'];
        $date = $row['Date_depart'];
        $classe = $row['classe'];
        $heure = $row['heure_reservation'];
?>
<div class="form">
    <form method="GET">
       <input type="hidden" name="id_billet" value="<?php echo $id_billet; ?>">
    <div class="billet">
        <div>
       <label for="">Lieu de départ : </label>
       <p><?php echo $depart; ?></p>
       <label for="">Lieu de destination : </label>
       <p><?php echo $lieu_destination; ?></p>
       <label for="">Date de départ : </label>
       <p><?php echo $date; ?></p>
       </div>
       <div>
       <label for="">Classe : </label>
       <p><?php echo $classe; ?></p>
       <label for="">Heure de réservation : </label>
     <p><input type="time" name="heure_reservation" class="heure" value="<?php echo $heure; ?>"></p>
     </div>
     <div class="lien">
      <a href="update.php?id_billet=<?php echo $id_billet; ?>">Modifier</a>
       <a href="delete.php?id_billet=<?php echo $id_billet; ?>">Annuler</a>
     </div>
    </div>
    </form>
</div>
<?php
    }
} else {
    echo "Aucune réservation trouvée.";
}
?>

</body>
</html>

