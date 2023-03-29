<?php require 'index.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pig Game</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,600" rel="stylesheet" type="text/css">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css">
    <link type="text/css" rel="stylesheet" href="style2.css">
</head>

<body>

<div class="wrapper clearfix">

    <div class="player-0-panel <?php if (!empty($game)) {
        if($game->getactiveplayer()===$game->player1()) echo("active");
    } ?>">
        <div class="player-name" id="name-0">Player 1</div>
        <div class="player-score" id="score-0">
           <?php if (!empty($game)) {
               echo($game->player1()->getscore());
           } ?>
        </div>
        <div class="player-current-box">
            <div class="player-current-label">Current</div>
            <div class="player-current-score" id="current-0"><?php if (isset($game)) {
                    echo($game->player1()->getcurrentscore());
                }
                ?></div>
        </div>
    </div>
    <div class="dice">
        <?php  if(isset($game)){
            echo(implode(",",$game->player1()->getrollvalues()));
            echo(implode(",",$game->player2()->getrollvalues()));
        }
        ?>
    </div>

    <div class="player-1-panel <?php if (!empty($game)) {
        if($game->getactiveplayer()===$game->player2()) echo("active");
    } ?>">
        <div class="player-name" id="name-1">Player 2</div>
        <div class="player-score" id="score-1"><?php if (!empty($game)) {
                echo($game->player2()->getscore());
            } ?></div>
        <div class="player-current-box">
            <div class="player-current-label">Current</div>
            <div class="player-current-score" id="current-1"><?php if (isset($game)) {
                    echo($game->player2()->getcurrentscore());
                }
                ?></div>
        </div>
    </div>
    <form method="post" action="">
    <button class="btn-new"><i class="ion-ios-plus-outline"></i>New game</button>

    <button class="btn-roll" name="submit" type="submit"><i class="ion-ios-loop" ></i>Roll dice</button>

    <button class="btn-hold" name="hold"><i class="ion-ios-download-outline"></i>Hold</button>

    </form>



</div>

</body>

</html>