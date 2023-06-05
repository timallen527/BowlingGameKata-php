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

    public function testAllOnesReturnsScoreOfTwenty()
    {
        $game = new BowlingGame();
        $this->rollMany($game,1);

        $this->assertSame(20, $game->Score());
    }

    public function testOneSpareAddsNextRoll()
    {
        $game = new BowlingGame();
        $game->Roll(6);
        $game->Roll(4);
        $game->Roll(3);
        $this->rollMany($game, 0, 17);
        $this->assertSame(16, $game->Score());
    }

    private function rollMany(BowlingGame $game, int $pins, int $numberOfRolls = 20) : void
    {
        for($i = 0; $i < $numberOfRolls; $i++)
        {
            $game->Roll($pins);
        }
    }
}