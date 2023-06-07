<?php
use PHPUnit\Framework\TestCase;

final class BowlingGameTest extends TestCase
{
    private BowlingGame $game;

    protected function setUp(): void
    {
        $this->game = new BowlingGame();
    }

    public function testAllGutterBallsReturnsScoreOfZero()
    {
        $this->rollMany(0, 20);

        $this->assertSame(0, $this->game->score());
    }

    public function testAllOnesReturnsScoreOfTwenty()
    {
        $this->rollMany(1);

        $this->assertSame(20, $this->game->score());
    }

    public function testOneSpareAddsNextRoll()
    {
        $this->rollSpare(6, 4);
        $this->game->roll(3);
        $this->rollMany(0, 17);

        $this->assertSame(16, $this->game->score());
    }

    public function testAllSpares()
    {
        $frame = 1;
        while ($frame++ <= 10)
        {
            $this->rollSpare(5,5);
        }

        $this->game->roll(5);

        $this->assertSame(150, $this->game->score());
    }

    public function testOneStrikeAddsNextTwoRolls()
    {
        $this->game->roll(10);
        $this->game->roll(4);
        $this->game->roll(3);
        $this->rollMany(0, 17);

        $this->assertSame(24, $this->game->score());
    }

    public function testPerfectGame()
    {
        $this->rollMany(10, 12);

        $this->assertSame(300, $this->game->score());
    }

    private function rollMany(int $pins, int $numberOfRolls = 20) : void
    {
        for($i = 0; $i < $numberOfRolls; $i++)
        {
            $this->game->roll($pins);
        }
    }

    private function rollSpare(int $firstRoll, int $secondRoll): void
    {
        $this->game->roll($firstRoll);
        $this->game->roll($secondRoll);
    }
}