<?php

include 'Connect.php';

 $Prenom =$_POST['Prenom'];
 $Nom = $_POST['Nom'];
 $Email =$_POST['email'];
 $role=1;
 $Password=$_POST['password'];

$sql=mysqli_query("db_tournoi","SELECT * FROM utilisateur WHERE mail='$Email'");
 
$compter=mysqli_num_rows($sql);

//on vérifie que l'utilisateur n'existe pas déjà
if ($compter>0)
{
	echo "Cet e-mail est déjà utilisé";
}
else{
	//on inscrit l'utilisateur dans la BD
	$sqlAjout="INSERT INTO utilisateur( nom, prenom,_role,mail,_password) 
	VALUES ('$Nom','$Prenom','$role','$Email','$Password')";
}
if($mysqli->query($sqlAjout)==true){
	echo "Compte bien créé";
}
 
else{
	echo "Inscription impossible. Vérifiez les données entrées svp";
}
$mysqli->close();
header("Refresh: 2; url=Index.html");
 
?>