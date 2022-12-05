<?php

use Day5\Puzzle;
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
        $this->assertEquals("CMZ", $this->puzzle->rearrangeStacks($this->input));
    }

    public function testSecondExample()
    {
        $this->assertEquals("MCD", $this->puzzle->multipleRearrange($this->input));
    }
}