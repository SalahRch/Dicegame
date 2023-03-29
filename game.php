<?php

class player{
    private string $name;
    private int $score;
    private int $currentscore;
    public array $rollvalues=[];
    function __construct($name)
    {
        $this->name=$name;
        $this->score=0;
        $this->currentscore=0;
    }
    function getcurrentscore(){
        return $this->currentscore;
    }
    function setcurrentscore($val){
        $this->currentscore=$val;
    }
    function getrollvalues(){
        return $this->rollvalues;
    }
    function getscore(){
        return $this->score;
    }
    function setscore($score){
        $this->score=$score;
    }
    function getname(){
        return $this->name;
    }
    function roll(){
        for($i=0;$i<3;$i++){
            $roll=rand(1,6);
            $this->rollvalues[]=$roll;
        }
    }
}
class calculatescore{
    public function calculate($dicevalues):int{
        $score=0;
        foreach($dicevalues as $value){
            if($value==1){
                $score=0;
                break;
            }
            else{
                $score+=$value;
            }
        }
        return $score;
    }
}

class game
{
    private $player1;
    private $player2;
    private $calculator;
    private $activeplayer;
    private $gameover;

    function __construct()
    {
        $this->player1 = new player("player 1");
        $this->player2 = new player("player 2");
        $this->calculator = new calculatescore();
        $this->activeplayer = $this->player1;
        $this->gameover = false;
    }

    function play()
    {
        if (!$this->gameover) {
            $this->activeplayer->roll();
            $score = $this->activeplayer->getscore();
            if($this->calculator->calculate($this->activeplayer->getrollvalues())==0){
                $score=0;
            }
            else $score += $this->calculator->calculate($this->activeplayer->getrollvalues());
            $this->activeplayer->setscore($score);
            if ($score >= 100) {
                $this->gameover = true;
            } else {
                $this->switchPlayer();
            }
        }
    }

    function hold()
    {
        if (!$this->gameover) {
            $temp=$this->activeplayer->getcurrentscore();
            if($temp==0) {
                $this->activeplayer->setcurrentscore($this->activeplayer->getscore());
                $this->activeplayer->setscore(0);
            }
            else {
                $this->activeplayer->setcurrentscore($temp+$this->activeplayer->getscore());
                $this->activeplayer->setscore(0);
                }
            if ($this->activeplayer === $this->player1) {
                $this->activeplayer = $this->player2;
            } else {
                $this->activeplayer = $this->player1;
            }
        }
    }

    function switchPlayer()
    {
        if ($this->activeplayer === $this->player1) {
            $this->activeplayer = $this->player2;
        } else {
            $this->activeplayer = $this->player1;
        }
    }

    function getactiveplayer()
    {
        return $this->activeplayer;
    }

    function player1()
    {
        return $this->player1;
    }

    function player2()
    {
        return $this->player2;
    }
    function clearollvalues(){
        $this->player1->rollvalues=[];
        $this->player2->rollvalues=[];
    }
}
