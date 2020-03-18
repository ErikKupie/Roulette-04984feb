<?php
class Bet
{
    private $amount;
    private $type;
    private $roll;
    private $winLoss;
    
    public function __construct($balance, $roll){
        $this->roll = $roll;
        $this->getAmount($balance);
        $this->getType();
        return $this->winOrLose();
    }

    public function getBet(){
        return [$this->amount, $this->winLoss];
    }

    private function getAmount($balance)
    {
        $amount = intval(readline("How much do you want to bid? "));
        if ($amount <= 0){
            echo("you will have to bid something!\n");
            $this->getAmount($balance);
        } elseif($amount > $balance){
            echo("You dont have that amount of money!\n");
            $this->getAmount($balance);
        }
        $this->amount = $amount; 
    }

    private function getType()
    {
        echo("1. Straight Bet\n");
        echo("2. Bet on Color\n");
        echo("3. Bet on Odd/Even\n");
        $this->type = readline("Where do you want to bid on? ");
    }

    private function winOrLose()
    {
        if ($this->roll[1] == 1){
            $colorWheel = " red";
        } else {
            $colorWheel = " black";
        }

        switch ($this->type){
            case "1":
                $number = intval(readline("On what number do you want to bet? (0 - 36) "));
                if ($number > 0 || $number <= 36){
                    if ($number == $this->roll[0]){
                        echo ($this->roll[0] . $colorWheel . "! you won!\n Your bet will be x 36.\n");
                        $this->amount = intval($this->amount) * 36;
                        $this->winLoss = "win";
                    }elseif($number != $this->roll[0]){
                        echo ($this->roll[0] . $colorWheel . ". you lost.\n");
                        $this->winLoss = "loss";
                    }
                } else {
                    echo("That is not a possible number!");
                    $this->winOrLose();
                }
            break;
            case "2":
                echo("1. Red\n");
                echo("2. Black\n");
                $color = strtolower(readline("On what color do you want to bet? "));
                if ($color == "1" || $color == "2"){              
                    
                    if (intval($color) == $this->roll[1]){
                        echo ($this->roll[0] . $colorWheel . "! you won!\n Your bet will be doubled.\n");
                        $this->amount = intval($this->amount) * 2;
                        $this->winLoss = "win";
                    }elseif($color != $this->roll[1]){
                        echo ($this->roll[0] . $colorWheel . ". you lost.\n");
                        $this->winLoss = "loss";
                    }
                } else {
                    echo("That is not a possible color!\n");
                    $this->winOrLose();
                }
            break;
            case "3":
                echo("1. Odd\n");
                echo("2. Even\n");
                $number = strtolower(readline("Where do you want to bet on? "));
                if ($number == "1" || $number == "2"){  

                    if ($number == "1" && $this->roll[0]%2 == 1){
                        echo ($this->roll[0] . $colorWheel . "! you won!\n Your bet will be doubled.\n");
                        $this->amount = intval($this->amount) * 2;
                        $this->winLoss = "win";
                    } else{
                        echo ($this->roll[0] . $colorWheel . ". you lost.\n");
                        $this->winLoss = "loss";

                    }
                } else {
                    echo("That is not a possible option!\n");
                    $this->winOrLose();
                }
            break;
        }
    }
}