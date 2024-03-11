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
    <link rel="stylesheet" href="reservation.css">
</head>
<body>
   <header>
   <div><img src="images\logo.png" alt="logo" class="logo"></div>
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
            <option value="Sénégal"<?php if ($row['lieu_de_depart'] == 'Sénégal') echo 'selected'; ?>>Sénégal</option>
            <option value="Nigéria"<?php if ($row['lieu_de_depart'] == 'Nigéria') echo 'selected'; ?>>Nigéria</option>
            <option value="Cap-vert"<?php if ($row['lieu_de_depart'] == 'Cap-vert') echo 'selected'; ?>>Cap-vert</option>
            <option value="Seychelles"<?php if ($row['lieu_de_depart'] == 'Seychelles') echo 'selected'; ?>>Seychelles</option>
            <option value="Mali"<?php if ($row['lieu_de_depart'] == 'Mali') echo 'selected'; ?>>Mali</option>
            <option value="Maroc"<?php if ($row['lieu_de_depart'] == 'Maroc') echo 'selected'; ?>>Maroc</option>
            <option value="Burkina Faso"<?php if ($row['lieu_de_depart'] == 'Burkina Faso') echo 'selected'; ?>>Burkina Faso</option>
            <option value="Afrique du Sud"<?php if ($row['lieu_de_depart'] == 'Afrique du Sud') echo 'selected'; ?>>Afrique du Sud</option>
            <option value="Niger"<?php if ($row['lieu_de_depart'] == 'Niger') echo 'selected'; ?>>Niger</option>
            <option value="Cameroun"<?php if ($row['lieu_de_depart'] == 'Cameroun') echo 'selected'; ?>>Cameroun</option>
            <option value="Comores"<?php if ($row['lieu_de_depart'] == 'Comores') echo 'selected'; ?>>Comores</option>
            <option value="Mauritanie"<?php if ($row['lieu_de_depart'] == 'Mauritanie') echo 'selected'; ?>>Mauritanie</option>
            <option value="Egypte"<?php if ($row['lieu_de_depart'] == 'Egypte') echo 'selected'; ?>>Egypte</option>
        </select>
     </div>
     <div>
       <label for="">Lieu de destination</label><br>
       <select name="Lieu_de_destination" id="" value="<?php echo $row['Lieu_de_destination']; ?>">
       <option value="Sénégal"<?php if ($row['Lieu_de_destination'] == 'Sénégal') echo 'selected'; ?>>Sénégal</option>
            <option value="Nigéria"<?php if ($row['Lieu_de_destination'] == 'Nigéria') echo 'selected'; ?>>Nigéria</option>
            <option value="Cap-vert"<?php if ($row['Lieu_de_destination'] == 'Cap-vert') echo 'selected'; ?>>Cap-vert</option>
            <option value="Seychelles"<?php if ($row['Lieu_de_destination'] == 'Seychelles') echo 'selected'; ?>>Seychelles</option>
            <option value="Mali"<?php if ($row['Lieu_de_destination'] == 'Mali') echo 'selected'; ?>>Mali</option>
            <option value="Maroc"<?php if ($row['Lieu_de_destination'] == 'Maroc') echo 'selected'; ?>>Maroc</option>
            <option value="Burkina Faso"<?php if ($row['Lieu_de_destination'] == 'Burkina Faso') echo 'selected'; ?>>Burkina Faso</option>
            <option value="Afrique du Sud"<?php if ($row['Lieu_de_destination'] == 'Afrique du Sud') echo 'selected'; ?>>Afrique du Sud</option>
            <option value="Niger"<?php if ($row['Lieu_de_destination'] == 'Niger') echo 'selected'; ?>>Niger</option>
            <option value="Cameroun"<?php if ($row['Lieu_de_destination'] == 'Cameroun') echo 'selected'; ?>>Cameroun</option>
            <option value="Comores"<?php if ($row['Lieu_de_destination'] == 'Comores') echo 'selected'; ?>>Comores</option>
            <option value="Mauritanie"<?php if ($row['Lieu_de_destination'] == 'Mauritanie') echo 'selected'; ?>>Mauritanie</option>
            <option value="Egypte"<?php if ($row['Lieu_de_destination'] == 'Egypte') echo 'selected'; ?>>Egypte</option>
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

