<?php

use Day3\Puzzle;
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
        $this->assertEquals(157, $this->puzzle->getSumItemTypesPriorities($this->input));
    }

    public function testSecondExample()
    {
        $this->assertEquals(70, $this->puzzle->getSumGroupsPriorities($this->input));
    }
}