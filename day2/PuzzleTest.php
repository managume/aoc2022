<?php

use Day2\Puzzle;
use PHPUnit\Framework\TestCase;

class PuzzleTest extends TestCase{
    private $puzzle;
    private $input;

    public function setUp():void
    {
        $this->puzzle = new Puzzle();
        $this->input = file(__DIR__.'/example.txt');
    }

    public function testFirstExample(){
        $this->assertEquals(15, $this->puzzle->totalScore($this->input));
    }

    public function testSecondExample(){
        $this->assertEquals(12, $this->puzzle->totalHackedScore($this->input));
    }
}