<?php

use Day4\Puzzle;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase
{
    private $puzzle;
    private $input;

    public function setUp():void
    {
        $this->puzzle = new Puzzle();
        $this->input = file(__DIR__.'/example.txt');
    }

    public function testFirstExample()
    {
        $this->assertEquals(2, $this->puzzle->countFullyIntersections($this->input));
    }

    public function testSecondExample()
    {
        $this->assertEquals(4, $this->puzzle->countOverlappingPairs($this->input));
    }
}