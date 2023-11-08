<!doctype html>
<link href="site.css" rel="stylesheet" media="all" type="text/css">
<html lang="fr">
<head>
<meta charset="UTF8" />
<link rel="stylesheet" href="Index.css" />
<link href=".htaccess" />
<title>
   Championnat 
</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

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

  <!-- INSCRIPTION FORMULAIRE -->
  <div align=center class="Inscription">
  <form method="POST" action="genereTournoi.php">

  <legend>Création Tournoi</legend>

  <table>
      <tr><td>Lieu</td><td><input type="text" name="lieu" required/></td></tr>
      <tr><td>Nombre d'équipes</td><td><input name="nbEquipes" id="koko" type="number" min=4 max=16 placeholder="puissance de 2" onchange="applyChange(validate(this))">
  <span id='note' hidden><font color=red>La nombre doit être une puissance de 2</font> 

  </span>

  <script>
  var saver=1;
  function applyChange(num)
  {
  document.getElementById('koko').value=num;
  }
  function validate(input)
  {
  document.getElementById('note').hidden=true;
  var number=input.value;
  if(Number.isInteger(Math.log2(number)))
      return (saver=number);
  else
    {
    document.getElementById('note').hidden=false;
    return saver;
  }
  }
  </script></td></tr>
        <tr><td>Intitulé</td><td><input type="text" name="nom" required /></td></tr>
    <tr><td><label for="start">Date de début :*</label>
    
        <input type="date" id="start" name="start-time"
        value="2020-01-01"
        min="2020-01-01" required></td></tr>
        <tr><td>
  </div> 

      </td></tr>

    </select>

  </table>
  <br/>

  <input type="submit" value=" Tout envoyer ">
  <INPUT TYPE="reset" VALUE=" Recommencer ">
  </form>
  </div>
</div>