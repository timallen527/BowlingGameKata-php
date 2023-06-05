<?php

class BowlingGame
{
    const MaxPins = 10;
    const NumberOfFrames = 10;
    protected array $rolls = [];

    public function Roll(int $pins) : void
    {
        $this->rolls[] = $pins;
    }

    public function Score(): int
    {
        $score = 0;
        $roll = 0;

        for ($i = 0; $i < self::NumberOfFrames; $i++)
        {
            if ($this->rolls[$roll] + $this->rolls[$roll + 1] == 10)
            {
                $score += 10 + $this->rolls[$roll + 2];
            }
            else
            {
                $score += $this->rolls[$roll] + $this->rolls[$roll + 1];
            }

            $roll += 2;
        }
        return $score;
    }
}