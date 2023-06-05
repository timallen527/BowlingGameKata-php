<?php

class BowlingGame
{
    protected array $rolls = [];

    public function Roll(int $pins) : void
    {
        $this->rolls[] = $pins;
    }

    public function Score(): int
    {
        $score = 0;

        foreach($this->rolls as &$roll)
        {
            $score += $roll;
        }
        return $score;
    }
}