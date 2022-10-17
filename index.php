<?php
  session_start();
  require("src/connect.php");

  if(isset($_COOKIE['tries']) && (isset($_COOKIE['pseudo']))) {
    $pseudo = htmlspecialchars($_COOKIE['pseudo']);
    $tries = htmlspecialchars($_COOKIE['tries']);
    $req = $db->prepare("INSERT INTO scoreboard(tries, pseudo) VALUES(?, ?)");
    $req->execute(array($tries, $pseudo));

    session_unset();
    session_destroy();
    setcookie('tries', '', time()-1, '/', null, false, true);
    setcookie('pseudo', '', time()-1, '/', null, false, true);
  }

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Le Juste Prix</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="Scoreboard">
  <form action="scoreboard/index.php">
    <button type="submit" id="Scoreboard" class="btn btn-primary">Scoreboard</button>
  </form>
</div>
<div class="container">
  
  <div class="row justify-content-center mt-5">
    
  </div>
  
  <!-- Formulaire -->
  <div class="row justify-content-center mt-5 mb-4">   
    <div class="col-lg-8">   
      <div class="bg-light p-5 shadow">
        <header>Le Juste Prix</header>
        <form id="formulaire">
          <input id="pseudo" class="form-control" placeholder="Entrez votre Pseudo !" />
          <div class="row">
            
            <div class="col">
              <input id="prix" class="form-control" placeholder="Devinez le prix ! (entre 0 et 1 000)" />
            </div>
            <button type="submit" class="btn btn-primary">Deviner</button>
          </div>

          <small class="text-danger">Vous devez rentrer un nombre.</small>
        </form>
        <form action="index.php" id="update">
          <i>Envoyer votre performance dans le Scoreboard :</i>
          <button type="submit" class="btn btn-primary">Enregister</button>
        </form>
        
      </div>  
    </div>
  </div>

  <!-- Instructions -->
  <div class="row justify-content-center">
    <div id="instructions" class="col-lg-8"></div>
  </div>
  
</div>

<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
