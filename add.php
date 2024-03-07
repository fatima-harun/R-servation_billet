<?php
require_once "connexion.php";
$sql_billet="SELECT * FROM billet";
$billet=mysqli_query($conn,$sql_billet);
if(mysqli_num_rows($billet)> 0){
    echo '<h1>'.'Votre billet'. '</h1>';
    while($row=mysqli_fetch_assoc($billet)){
        echo '<form action="listeBillet" method="GET">';
        echo '<div class="container">';
        echo '<div>';
        echo '<p>'.'Lieu de départ: <br>'.$row['lieu_de_depart'].'</p>';
        echo '<p>'.'Date de depart: <br>'.$row['Date_depart'].'</p>';
        echo '<p>'.'Classe: <br>'.$row['classe'].'</p>';
        echo '</div>';
        echo '<div>';
        echo '<p>'.'Lieu de destination: <br>'.$row['Lieu_de_destination'].'</p>';
        echo '<p>'.'Heure de réservation: <br>'.$row['heure_reservation'].'</p>';
        echo '</div>';
        echo '</div>';
        echo '<button>'.'Modifier'.'</button>';
        echo '<button>'.'Annuler'.'</button>';
        echo '</form>';
    }
}

?>
