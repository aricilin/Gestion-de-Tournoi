<!doctype html>
<link href="site.css" rel="stylesheet" media="all" type="text/css">
<html lang="fr">
<head>
<meta charset="UTF8" />
<link rel="stylesheet" href="Index.css" />
<link rel="stylesheet" href="Tournoi.css" />
<link href=".htaccess" />
<title>
   Championnat 
</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="jquery.bracket.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="jquery.bracket.min.js"></script>
</head>
<body>

<?php
include "Connect.php";
if( !isset($_GET['idTournoi'])){
  $_GET['idTournoi']=-1;
}
$_GET['nbEquipes']=$_GET['nombreEquipes'];
$idT=$_GET['idTournoi'];

$equipes1_req=$mysqli->query("SELECT * FROM equipe WHERE idEquipe IN (SELECT equipe1 FROM matches WHERE organisePar = $idT)");
$equipes2_req=$mysqli->query("SELECT * FROM equipe WHERE idEquipe IN (SELECT equipe2 FROM matches WHERE organisePar = $idT)");
$tabNomEquipes1[$_GET['nbEquipes']];
$i=0;
$tabNomEquipes2[$_GET['nbEquipes']];
$j=0;
while($nomsEq1=mysqli_fetch_array($equipes1_req)){
  $tabNomEquipes1[$i]=$nomsEq1['nom'];
  $i++;  
}

while($nomsEq2=mysqli_fetch_array($equipes2_req)){
  $tabNomEquipes2[$j]=$nomsEq2['nom'];
  $j++;  
}


$idM=$_GET['idMatch'];
$score1_req=$mysqli->query("SELECT score1 FROM matches WHERE OrganisePar=$idT");
$score2_req=$mysqli->query("SELECT score2 FROM matches WHERE OrganisePar=$idT");
$tabScores1[$_GET['nbEquipes']];
$tabScores2[$_GET['nbEquipes']];
$cpt1=0;
$cpt2=0;

while($valScores1=mysqli_fetch_array($score1_req)){
  $tabScores1[$cpt1]=$valScores1['score1'];
  $cpt1++;
}

while($valScores2=mysqli_fetch_array($score2_req)){
  $tabScores2[$cpt2]=$valScores2['score2'];
  $cpt2++;
}

?>

<script>

window.onload = function() {
  function genereTournoi(){
  var TabNoms1=<?php echo json_encode($tabNomEquipes1); ?>;
  var TabNoms2=<?php echo json_encode($tabNomEquipes2); ?>;

  /* fetch('afficheArbre.php?nbEquipes=' + nbEquipes + '&nom=' + nom + '&lieu=' + lieu + '&start=' + start);*/

  //Calcul teams pour minimaldata
  const teams = [];
  for (let i = 0; i < nbEquipes/2; i++){
    let team = [TabNoms1[i], TabNoms2[i]];
    teams.push(team);
  }

  //Calcul results pour minimaldata
  var tabScore1=<?php echo json_encode($tabScores1); ?>;
  var tabScore2=<?php echo json_encode($tabScores2); ?>;
  console.log("scores1: ", tabScore1);
  const results = [];
  let cpt=0;
  let cpt2=0;
  for(let i=nbEquipes; i>1; i/=2){
    let result1 = [];
    for(let j=cpt; j<(nbEquipes+cpt)/2; j++){
      let score1=Number(tabScore1[j]);
      let score2=Number(tabScore2[j]);
      result1.push([score1,score2]);
      cpt2++
    }
    cpt=cpt2;
    results.push(result1);
  } 


  //Utilisation de la bibli jquery bracket
  const minimalData = {
    teams : teams,
    results : results
  };

  console.log(minimalData);
 
  $('#bracket').bracket({
    skipConsolationRound: true,
    teamWidth: 180,
    scoreWidth: 40,
    matchMargin: 75,
    roundMargin: 90,
    init: minimalData});
}



  $("#form").submit(function(e){
      var table = $("#resultTable");
      var rowNum = parseInt($("#table-row-num").val(), 10);
      var resultHtml = '';

    for(var i = 0 ; i < rowNum ; i++) {
      resultHtml += ["<tr>", 
    "<td>", 
      (i+1),
    "</td>",
    '<td><input type="name" placeholder="Nom de l\'équipe"></td>',
    '<td><input type="name" placeholder="Capitaine de l\'équipe"></td>',
    '</tr>'].join("\n");
  }

  table.html(resultHtml);
    return false; 
  });

  let nbEquipes = Number("<?php echo ($_GET['nbEquipes']); ?>");
  let nom = "<?php echo ($_GET['nom']); ?>";
  let lieu = "<?php echo ($_GET['lieu']); ?>";
  let start = "<?php echo ($_GET['start']); ?>";
  
  if(nbEquipes){
    genereTournoi();
  }
}

</script> <!-- FIN TEST -->
  
<div class="co">
  <a class="active" href="Logout.php">Déconnexion</a>
</div>

<div class="top">
  <div class='slide1'></div>
  <div class='slide2'></div>
  <div class='slide3'></div>
</div>  
  
<div class="topnav">
  <a class="active" href="IndexGestionnaire.html">Accueil</a>
  <a href="ListeTournoiGestionnaire.php">Liste Des Tournois</a>
  <a href="CreerTournoi.php">Créer Tournoi</a>
  <a href="MesTournois.php">Mes Tournois</a>  
</div>

<div class="back">	
  <div id="login" class="modal">

 <!-- La Partie de login option -->
  
  <form class="modal-content animate" action="Login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close Modal"></span>
      <img src="Des_Images/Login.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Nom d'utilisateur</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Mot de pass</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Connexion</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('login').style.display='none'" class="cancelbtn">Annuler</button>
      <span class="psw">Mot de pass <a href="#">oublié?</a></span>
    </div>
  </form>
</div>

<script>

var modal = document.getElementById('login');

// Pour fermer la boite lorsque l'utilisateur clique en dehors
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
 <!-- Fin de l'option Login -->


<!-- INSCRIPTION FORMULAIRE -->

<div id="bracket"></div>

</div>
</body>
</html>