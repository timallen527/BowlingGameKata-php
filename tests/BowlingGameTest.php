<?php
use PHPUnit\Framework\TestCase;

final class BowlingGameTest extends TestCase
{
    public function testAllGutterBallsReturnsScoreOfZero()
    {
        $game = new BowlingGame();

        $score = $game->Score();

        $this->assertSame(0, $score);
    }
}