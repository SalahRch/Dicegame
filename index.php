<?php
require 'game.php';
session_start();

if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = new game();
}

$game = $_SESSION['game'];
if(isset($_POST['submit'])){
    $game->clearollvalues();
    $game->play();
}
if(isset($_POST['hold'])){
    $game->hold();
}
