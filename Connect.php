<?php

// Connexion avec la BD
$mysqli = new mysqli("localhost","root", "","db_tournoi");

// Message d'erreur classique si la connexion ne se fait pas
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

?>