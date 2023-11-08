<?php

include 'Connect.php';
 ob_start();
 session_start();

 $Prenom =$_POST['Prenom'];
 $Nom = $_POST['Nom'];
 $Email =$_POST['email'];
 $role=2;
 $Password=$_POST['password'];
 $equipe=$_SESSION['idEquipe'];
 
 $result = $mysqli->query("SELECT * FROM joueur WHERE idEquipe=$equipe"); 
 /* Détermine le nombre de lignes du jeu de résultats */
 $row_cnt = $result->num_rows;

$sql=mysqli_query("db_tournoi","SELECT * from utilisateur WHERE mail='$Email'");
 
$compter=mysqli_num_rows($sql);

//on vérifie que l'utilisateur n'existe pas déjà
if ($compter>0)
{
	echo "Cet e-mail est déjà utilisé";
}
else if($row_cnt<4){
	$sqlAjout="INSERT INTO Utilisateur( nom, prenom,_role,mail,_password) 
	VALUES ('$Nom','$Prenom','$role','$Email','$Password')";
	$sqlJoueur="INSERT INTO joueur(nom,prenom,_role,mail,EquipeAppartient)
	VALUES ('$Nom','$Prenom','$role','$Email','$equipe')";
	
	if(($mysqli->query($sqlAjout)==true)&&($mysqli->query($sqlJoueur)==true)){
		echo "Compte bien créé";
	}
}
 
else{
	echo "Inscription impossible. Vérifiez les données entrées svp";
}
$mysqli->close();

if($_SESSION['_role']==1){
	header("Refresh: 2; url=AjoutJoueur.php?idEquipe=$equipe");
}
else{
	header("Refresh: 2; url=MonEquipe.php?idEquipe=$equipe");
}

?>