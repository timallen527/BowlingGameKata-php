<?php
use PHPUnit\Framework\TestCase;

final class BowlingGameTest extends TestCase
{
    public function testAllGutterBallsReturnsScoreOfZero()
    {
        $game = new BowlingGame();
        $this->rollMany($game,0, 20);

        $this->assertSame(0, $game->Score());
    }

    private function rollMany(BowlingGame $game, int $pins, int $numberOfRolls)
    {
        for($i = 0; $i < $numberOfRolls; $i++)
        {
            $game->Roll($pins);
        }
    }
}