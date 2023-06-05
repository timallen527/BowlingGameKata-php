<?php

class BowlingGame
{
    private $rolls = array();

    public function Roll(int $pins)
    {
        $rolls = $pins;
    }

    public function Score(): int
    {
        return array_sum($this->rolls);
    }
}