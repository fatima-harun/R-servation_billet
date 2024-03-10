<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_billet = $_GET['id_billet'];
    $lieu_de_depart = $_POST['lieu_de_depart'];
    $Lieu_de_destination = $_POST['Lieu_de_destination'];
    $Date_depart = $_POST['Date_depart'];
    $prix = $_POST['prix'];
    $classe = $_POST['classe'];
    $heure_reservation = $_POST['heure_reservation'];
    require_once "connexion.php";
    // Requête SQL pour mettre à jour les données
    $sql = "UPDATE billet SET lieu_de_depart='$lieu_de_depart', Lieu_de_destination='$Lieu_de_destination', Date_depart='$Date_depart', prix=$prix, classe='$classe', heure_reservation='$heure_reservation' WHERE id_billet=$id_billet";
    
    // Exécuter la requête SQL
    if (mysqli_query($conn, $sql)) {
        header("Location: reservation.php");
        exit;
    } else {
        echo "Erreur lors de la mise à jour : " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de mon billet </title>
    <link rel="stylesheet" href="reserve.css">
</head>
<body>
   <header>
      <div><img src="images\Train Express.png" alt="logo_train" class="train"></div>
      <nav>
       <a href="">Itinéraires</a>
       <a href="">Horaires</a>
       <a href="">Réservations</a>
       <a href="">Nous contacter</a>
      </nav>
      <div class="lien_login">
        <a href="">Se connecter</a>
        <a href="">Ouvrir un compte</a>
        </div>
   </header>
   <?php
  $id_billet = $_GET['id_billet'];
// connexion à la base de données
require_once "connexion.php";
$sql_billet="SELECT * FROM billet WHERE id_billet=$id_billet";
$billet=mysqli_query($conn,$sql_billet);
if(mysqli_num_rows($billet)> 0){
$row=mysqli_fetch_assoc($billet);
}
?>
   <div class="first_part">
   <form action="update.php?id_billet=<?php echo $id_billet; ?>"  method="POST">
      <h1>Modifier mon billet</h1>
    <div class="form_div">
 <div class="champ_form">
        <!-- first div -->
     <div>
       <label for="">Lieu de départ</label><br>
        <select name="lieu_de_depart" id="" value="<?php echo $row['lieu_de_depart']; ?>">
            <option value="Dakar"<?php if ($row['lieu_de_depart'] == 'Dakar') echo 'selected'; ?>>Dakar</option>
            <option value="Colobanne"<?php if ($row['lieu_de_depart'] == 'Colobanne') echo 'selected'; ?>>Colobanne</option>
            <option value="Hann"<?php if ($row['lieu_de_depart'] == 'Hann') echo 'selected'; ?>>Hann</option>
            <option value="Dalifort"<?php if ($row['lieu_de_depart'] == 'Dalifort') echo 'selected'; ?>>Dalifort</option>
            <option value="Beaux maraichers"<?php if ($row['lieu_de_depart'] == 'Beaux maraichers') echo 'selected'; ?>>Beaux maraichers</option>
            <option value="Pikine"<?php if ($row['lieu_de_depart'] == 'Pikine') echo 'selected'; ?>>Pikine</option>
            <option value="Thiaroye"<?php if ($row['lieu_de_depart'] == 'Thiaroye') echo 'selected'; ?>>Thiaroye</option>
            <option value="Yeumbeul"<?php if ($row['lieu_de_depart'] == 'Yeumbeul') echo 'selected'; ?>>Yeumbeul</option>
            <option value="Keur Mbaye Fall"<?php if ($row['lieu_de_depart'] == 'Keur Mbaye Fall') echo 'selected'; ?>>Keur Mbaye fall</option>
            <option value="PNR"<?php if ($row['lieu_de_depart'] == 'PNR') echo 'selected'; ?>>PNR</option>
            <option value="Rufisque"<?php if ($row['lieu_de_depart'] == 'Rufisque') echo 'selected'; ?>>Rufisque</option>
            <option value="Bargny"<?php if ($row['lieu_de_depart'] == 'Bargny') echo 'selected'; ?>>Bargny</option>
            <option value="Diamniadio"<?php if ($row['lieu_de_depart'] == 'Diamniadio') echo 'selected'; ?>>Diamniadio</option>
        </select>
     </div>
     <div>
       <label for="">Lieu de destination</label><br>
       <select name="Lieu_de_destination" id="" value="<?php echo $row['Lieu_de_destination']; ?>">
       <option value="Dakar"<?php if ($row['Lieu_de_destination'] == 'Dakar') echo 'selected'; ?>>Dakar</option>
            <option value="Colobanne"<?php if ($row['Lieu_de_destination'] == 'Colobanne') echo 'selected'; ?>>Colobanne</option>
            <option value="Hann"<?php if ($row['Lieu_de_destination'] == 'Hann') echo 'selected'; ?>>Hann</option>
            <option value="Dalifort"<?php if ($row['Lieu_de_destination'] == 'Dalifort') echo 'selected'; ?>>Dalifort</option>
            <option value="Beaux maraichers"<?php if ($row['Lieu_de_destination'] == 'Beaux maraichers') echo 'selected'; ?>>Beaux maraichers</option>
            <option value="Pikine"<?php if ($row['Lieu_de_destination'] == 'Pikine') echo 'selected'; ?>>Pikine</option>
            <option value="Thiaroye"<?php if ($row['Lieu_de_destination'] == 'Thiaroye') echo 'selected'; ?>>Thiaroye</option>
            <option value="Yeumbeul"<?php if ($row['Lieu_de_destination'] == 'Yeumbeul') echo 'selected'; ?>>Yeumbeul</option>
            <option value="Keur Mbaye Fall"<?php if ($row['Lieu_de_destination'] == 'Keur Mbaye Fall') echo 'selected'; ?>>Keur Mbaye fall</option>
            <option value="PNR"<?php if ($row['Lieu_de_destination'] == 'PNR') echo 'selected'; ?>>PNR</option>
            <option value="Rufisque"<?php if ($row['Lieu_de_destination'] == 'Rufisque') echo 'selected'; ?>>Rufisque</option>
            <option value="Bargny"<?php if ($row['Lieu_de_destination'] == 'Bargny') echo 'selected'; ?>>Bargny</option>
            <option value="Diamniadio"<?php if ($row['Lieu_de_destination'] == 'Diamniadio') echo 'selected'; ?>>Diamniadio</option>
        </select>
     </div>
 </div>
    <!-- second div -->
    <div class="champ_form">
        <div>
           <label for="">Date</label><br>
            <input type="date" name="Date_depart" value="<?php echo $row['Date_depart']; ?>">
        </div>
        <div>
         <?php
         date_default_timezone_set('Africa/Dakar')
         ?>
        <label for="heure_reservation">Heure de réservation</label><br>
        <input type="text" id="heure_reservation" name="heure_reservation" value="<?php echo $row['heure_reservation']; ?>">
    </div>
   </div>
    <!-- third div -->
    <div class="champ_form">
       <div>
       <label for="">Prix</label><br>
        <input type="text" name="prix" value="<?php echo $row['prix']; ?>">
       </div>
       <div>
       <label for="">Classe</label><br>
        <select name="classe">
            <option value="Première classe"<?php if ($row['classe'] == 'Première classe') echo 'selected'; ?>>Première classe</option>
            <option value="Deuxième classe"<?php if ($row['classe'] == 'Deuxième classe') echo 'selected'; ?>>Deuxième classe</option>
        </select>
       </div>
    </div>
    </div>
    <button type="Submit">Réservez</button>
   </form>
</div>
</body>
</html>

