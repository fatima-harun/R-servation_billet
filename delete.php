<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuler le billet</title>
</head>
<body>
    <?php
    $id_billet=$_GET['id_billet'];
    require_once "connexion.php";
    $sql="DELETE FROM billet WHERE id_billet = $id_billet";
    if(mysqli_query($conn,$sql)){
        header("location:add.php?message$DeleteSuccess");
        }
    ?>
</body>
</html>