<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de billet</title>
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
   <div class="first_part">
   <form  method="POST">
      <h1>Réservation</h1>
    <div class="form_div">
 <div class="champ_form">
        <!-- first div -->
     <div>
       <label for="">Lieu de départ</label><br>
        <select name="lieu_de_depart" id="">
            <option value="Dakar">Dakar</option>
            <option value="Colobanne">Colobanne</option>
            <option value="Hann">Hann</option>
            <option value="Dalifort">Dalifort</option>
            <option value="Beaux maraichers">Beaux maraichers</option>
            <option value="Pikine">Pikine</option>
            <option value="Thiaroye">Thiaroye</option>
            <option value="Yeumbeul">Yeumbeul</option>
            <option value="Keur Mbaye Fall">Keur Mbaye fall</option>
            <option value="PNR">PNR</option>
            <option value="Rufisque">Rufisque</option>
            <option value="Bargny">Bargny</option>
            <option value="Diamniadio">Diamniadio</option>
        </select>
     </div>
     <div>
       <label for="">Lieu de destination</label><br>
       <select name="Lieu_de_destination" id="">
            <option value="Dakar">Dakar</option>
            <option value="Colobanne">Colobanne</option>
            <option value="Hann">Hann</option>
            <option value="Dalifort">Dalifort</option>
            <option value="Beaux maraichers">Beaux maraichers</option>
            <option value="Pikine">Pikine</option>
            <option value="Thiaroye">Thiaroye</option>
            <option value="Yeumbeul">Yeumbeul</option>
            <option value="Keur Mbaye Fall">Keur Mbaye fall</option>
            <option value="PNR">PNR</option>
            <option value="Rufisque">Rufisque</option>
            <option value="Bargny">Bargny</option>
            <option value="Diamniadio">Diamniadio</option>
        </select>
     </div>
 </div>
    <!-- second div -->
    <div class="champ_form">
        <div>
           <label for="">Date</label><br>
            <input type="date" name="Date_depart">
        </div>
        <div>
         <?php
         date_default_timezone_set('Africa/Dakar')
         ?>
        <label for="heure_reservation">Heure de réservation</label><br>
        <input type="text" id="heure_reservation" name="heure_reservation" value="<?php echo date('H:i:s'); ?>" readonly>
    </div>
   </div>
    <!-- third div -->
    <div class="champ_form">
       <div> 
       <label for="">Prix</label><br>
        <input type="text" name="prix">
       </div>
       <div>
       <label for="">Classe</label><br>
        <select name="classe" id="">
            <option value="Première classe">Première classe</option>
            <option value="Deuxième classe">Deuxième classe</option>
        </select>
       </div>
    </div>
    </div>
    <button type="Submit">Réservez</button>
    
   </form>
</div>
<?php
// connexion à la base de données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
require_once "connexion.php";
$id=$_POST['id_billet'];
$depart=$_POST['lieu_de_depart']; 
$lieu_destination=$_POST['Lieu_de_destination'];
$date=$_POST['Date_depart'];
$prix=$_POST['prix'];
$classe=$_POST['classe'];
$heure=$_POST['heure_reservation'];

// on fait l'insertion des données
$sql="INSERT INTO billet (lieu_de_depart, Lieu_de_destination, Date_depart,classe, prix,heure_reservation) VALUES ('$depart','$lieu_destination','$date','$classe',$prix,'$heure')";
$result=mysqli_query($conn,$sql);
if($result){
    header("location: add.php");
      exit();
} else {
   echo "Erreur lors de l'insertion des données : " . mysqli_error($conn);
}
}
?>
</body>
</html>
