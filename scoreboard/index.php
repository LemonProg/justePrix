<?php
    require("../src/connect.php");

    $req = $db->prepare("SELECT MIN(tries) FROM scoreboard");
    $req->execute();

    while($user = $req->fetch()){
        echo("<h1>Scoreboard</h1>");
        $req = $db->prepare("SELECT * FROM scoreboard WHERE tries = ?");
        $req->execute(array($user[0]));
        while($pseudo = $req->fetch()){
            $pseudoBest = $pseudo['pseudo'];
            $scoreBest = $pseudo['tries'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Juste Prix - Scoreboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>"<?php echo($pseudoBest);?>" have the best score : #<?php echo($scoreBest);}}?></h2>
    <div id="array">
        <table>
            <tr>
                <th>Pseudo :</th>
                <th>Score :</th>
            </tr>
            <?php

                $req = $db->prepare("SELECT * FROM scoreboard");
                $req->execute();

                while($user = $req->fetch()){
                    $pseudo = $user['pseudo'];
                    $score = $user['tries'];
                    echo("<tr><td>".$pseudo."</td>");
            ?>
            <?php echo("<td>#".$score."</td></tr>"); }?>
        </table>
    </div>
    <div id="main">
        <form action="../index.php">
            <button type="submit" id="mainBtn" class="btn btn-primary">Retour au jeu</button>
        </form>
    </div>
</body>
</html>