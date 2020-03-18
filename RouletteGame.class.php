<?php
class RouletteGame
{
    private $table;
    private $balance = 500;

   public function __construct()
    {
        $this->play();
    }
   private function play()
    {
        $play = true;
        echo("Your balance is: $this->balance credits\n");
        while($this->balance > 0 && $play == true){
            $roundCreator = new Table();
            $round = $roundCreator->addBet($this->balance);
            if ($round[1] == "loss"){
                $this->balance = $this->balance - intval($round[0]);
            } else {
                $this->balance = $this->balance + intval($round[0]);
            }
            echo("Your balance is now: $this->balance credits\n");
            $play = $this->playAgain();
        }
        echo("Thank you for playing!");
    }
    
    private function playAgain() {
        echo("1. Yes\n");
        echo("2. No\n");
        $playAgain = readline("want to play again? ");
        if ($playAgain == "1" || $playAgain == "2"){
            if ($playAgain == "1"){
                return true;
                echo("Lets play again!\n");
            } else {
                return false;
            }
        } else {
            echo("That is not a possible option!\n");
            $this->playAgain();
        }
    }
}