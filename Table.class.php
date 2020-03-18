<?php
class Table
{
    public function addBet($balance)
    {
        $newBet = new Bet($balance, $this->roll()); 
        return $newBet->getBet();
    }

    private function roll()
    {
        $newRoll = new Wheel();
        $roll = $newRoll->getRoll();
        return $roll;
    }
}