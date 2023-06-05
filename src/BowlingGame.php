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
            if ($this->isStrike($roll))
            {
                $score += $this->GetStrikeScoreForFrame($roll);
                $roll++;
            }
            else if ($this->isSpare($roll))
            {
                $score += $this->GetSpareScoreForFrame($roll);
                $roll += 2;
            }
            else
            {
                $score += $this->GetScoreForRollsInFrame($roll);
                $roll += 2;
            }
        }
        return $score;
    }

    public function GetStrikeScoreForFrame(int $roll): mixed
    {
        return self::MaxPins + $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    public function isStrike(int $roll): bool
    {
        return $this->rolls[$roll] == self::MaxPins;
    }

    public function isSpare(int $roll): bool
    {
        return $this->GetScoreForRollsInFrame($roll) == self::MaxPins;
    }

    public function GetSpareScoreForFrame(int $roll): mixed
    {
        return self::MaxPins + $this->rolls[$roll + 2];
    }

    /**
     * @param int $roll
     * @return mixed
     */
    public function GetScoreForRollsInFrame(int $roll): mixed
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }
}