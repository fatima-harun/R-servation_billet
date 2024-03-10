<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des réservations</title>
</head>
<body>
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
    <form method="GET">
       <input type="hidden" name="id_billet" value="<?php echo $id_billet; ?>">
       <label for="">Lieu de départ : </label>
       <span><?php echo $depart; ?></span><br>
       <label for="">Lieu de destination : </label>
       <span><?php echo $lieu_destination; ?></span><br>
       <label for="">Date de départ : </label>
       <span><?php echo $date; ?></span><br>
       <label for="">Classe : </label>
       <span><?php echo $classe; ?></span><br>
       <label for="">Heure de réservation : </label>
       <input type="time" name="heure_reservation" value="<?php echo $heure; ?>"><br>
       <a href="update.php?id_billet=<?php echo $id_billet; ?>">Modifier</a>
       <a href="delete.php?id_billet=<?php echo $id_billet; ?>">Annuler</a>
    </form>
<?php
    }
} else {
    echo "Aucune réservation trouvée.";
}
?>

</body>
</html>

