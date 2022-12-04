<?php

use Day1\Puzzle;
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
        $this->assertEquals(24000, $this->puzzle->maxCaloriesPerElf($this->input));
    }

    public function testSecondExample(){
        $this->assertEquals(45000, $this->puzzle->topThreeMaxCaloriesPerElf($this->input));
    }
}