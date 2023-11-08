<?php
include 'Connect.php';
session_start();
ob_start();

   $username =$_POST['Email'];
   $password =$_POST['password'];  
   
   $sql="SELECT * FROM utilisateur WHERE mail = '$username' AND _password = '$password'";
   $prendre=$mysqli->query($sql);
   if($prendre->num_rows>0){
     while($row=$prendre->fetch_assoc()){
       $_SESSION["_role"]=$row["_role"];
       $_SESSION["id"]=$row["idUtilisateur"];
     }
    }
     if ($_SESSION['_role']=='1') {
      header("Refresh: 0.5; url=IndexGestionnaire.html");
     }
     else if($_SESSION['_role']=='0'){
      $sql="SELECT * FROM joueur WHERE mail = '$username'";
      $prendre=$mysqli->query($sql);
      if($prendre->num_rows>0){
        while($row=$prendre->fetch_assoc()){
          $_SESSION["idJoueur"]=$row["idJoueur"];
      $_SESSION['idEquipe']=$row['EquipeAppartient'];
  
      header("Refresh: 0.5; url=IndexCapitaine.html");
     }
    }
  }
     else if($_SESSION['_role']=='2'){
      $sql="SELECT * FROM joueur WHERE mail = '$username'";
      $prendre=$mysqli->query($sql);
      if($prendre->num_rows>0){
        while($row=$prendre->fetch_assoc()){
          $_SESSION["idJoueur"]=$row["idJoueur"];
      $_SESSION['idEquipe']=$row['EquipeAppartient'];

      header("Refresh: 0.5; url=IndexJoueur.html");
     }
   }
  }
 
  else {
    echo "Vérifiez votre nom d'utilisateur ou mot de pass";
    header("Refresh: 0.5; url=Index.html");
   }
  
?>