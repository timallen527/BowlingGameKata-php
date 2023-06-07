<?php

class BowlingGame
{
    const MaxPins = 10;
    const NumberOfFrames = 10;
    private array $rolls = [];

    public function roll(int $pins) : void
    {
        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $rollIndex = 0;

        for ($i = 0; $i < self::NumberOfFrames; $i++)
        {
            if ($this->isStrike($rollIndex))
            {
                $score += $this->getStrikeScoreForFrame($rollIndex);
                $rollIndex++;
            }
            else
            {
                if ($this->isSpare($rollIndex))
                {
                    $score += $this->getSpareScoreForFrame($rollIndex);
                }
                else
                {
                    $score += $this->getScoreForRollsInFrame($rollIndex);
                }

                $rollIndex += 2;
            }
        }

        return $score;
    }

    private function isStrike(int $roll): bool
    {
        return $this->rolls[$roll] == self::MaxPins;
    }

    private function isSpare(int $roll): bool
    {
        return $this->getScoreForRollsInFrame($roll) == self::MaxPins;
    }

    private function getStrikeScoreForFrame(int $roll): int
    {
        return self::MaxPins + $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    private function getSpareScoreForFrame(int $roll): int
    {
        return self::MaxPins + $this->rolls[$roll + 2];
    }

    private function getScoreForRollsInFrame(int $roll): int
    {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }
}