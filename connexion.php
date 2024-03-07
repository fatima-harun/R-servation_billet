<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'Juin1706-*2000');
define('DB_NAME', 'gestion_billet'); $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
