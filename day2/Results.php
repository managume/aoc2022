<?php

use Day2\Puzzle;
require_once('Puzzle.php');

$puzzle = new Puzzle();
$puzzle(file(__DIR__ . '/input.txt'));
