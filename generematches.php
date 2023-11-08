<?php
include "Connect.php";
ob_start();
session_start();
$idT=$_GET['idTournoi'];
$nbEquipe=$_SESSION['nbEquipes'];

$tournoi="SELECT * FROM tournoi WHERE idTournoi=$idT";
$prendre=$mysqli->query($tournoi);
$nom=mysqli_fetch_array($prendre);
$niveauT=$nom['niveau'];
$_date=$nom['dateDebut'];
$i=$nbEquipe;

//compter la nombre de niveau
$compteur=0;
while($i!=1)
{
    $i=$i/2;
    $compteur++;
}
if($niveauT<$compteur){
    $equipes="SELECT idEquipe FROM equipe WHERE tournoiContient=$idT AND niveau=$niveauT+1";
    $prendre=$mysqli->query($equipes);
    $n=0;
    while($equipe=mysqli_fetch_array($prendre)){
        $idE[$n]=$equipe['idEquipe'];
        $n++;
    }
    //Pour controle le nombre de joueur
    for($i=0;$i<$n;$i++)
    {
        $equipe=$idE[$i];
        $result = $mysqli->query("SELECT * FROM joueur WHERE EquipeAppartient=$equipe"); 
        $row_cnt = $result->num_rows;
        if($row_cnt==0)
        {
            echo "Ajout des joueurs d'abord";
            header("Refresh: 2; url=MesTournois.php");
            exit();
        }
    }
    //Pour augmenter le niveau de tournoi 
    $nombreEquipeActuel=sizeof($idE);
    if($nombreEquipeActuel>=2){
        $mysqli->query("UPDATE tournoi 
        SET niveau=$niveauT+1
        WHERE idTournoi=$idT");
        }
        else{
            echo "Saisir d'abord les scores";
            header("Refresh: 2; url=MesTournois.php");
            
        }

    //Pour creer le match final
    if($nombreEquipeActuel==2)
    {
        $sqlAjout="INSERT INTO matches(equipe1,equipe2,_date,OrganisePar)
        VALUES('$idE[0]','$idE[1]','$_date','$idT')"; 
        $sql=$mysqli->query($sqlAjout);
        echo "FINAL DU TOURNOI";
        header("Refresh: 2; url=MesTournois.php");
    }
    else{
        for($j=0;$j<$nombreEquipeActuel/2;$j++){
            $eq1=$idE[$j];
        
            $deuxieme=$nombreEquipeActuel/2+$j;
            $eq2=$idE[$deuxieme];

            $sqlAjout="INSERT INTO matches(equipe1,equipe2,_date,OrganisePar)
            VALUES('$eq1','$eq2','$_date','$idT')";
            $sql=$mysqli->query($sqlAjout);
            
        }
        echo "Veuillez Saisir des Scores";
        header("Refresh: 2; url=MesTournois.php");
    }
}
else{
    echo "Tournoi déjà terminé";
    header("Refresh: 2; url=MesTournois.php");
}

?>