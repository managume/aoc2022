<?php

class Puzzle
{
    const STONE = 1;
    const PAPER = 2;
    const SCISSORS = 3;

    const LOST = 0;
    const DRAW = 3;
    const WON = 6;

    public function totalScore($input)
    {
        $totalScore = 0;
        foreach ($input as $inputLine) {
            $round = explode(' ',trim($inputLine));
            $totalScore += self::resolveRound($round[0],$round[1]);
        }
        return $totalScore;
    }
    public function totalHackedScore($input)
    {
        $totalHackedScore = 0;
        foreach ($input as $inputLine) {
            $round = explode(' ',trim($inputLine));
            $totalHackedScore += self::hackRound($round[0],$round[1]);
        }
        return $totalHackedScore;
    }

    private function resolveRound($a, $b){
        $result = 0;
        if($a == 'A'){ // STONE
            switch ($b) {
                case 'X': // STONE
                    $result = self::STONE + self::DRAW;
                    break;
                case 'Y': // PAPER
                    $result = self::PAPER + self::WON;
                    break;
                case 'Z': // SCISSORS
                    $result = self::SCISSORS + self::LOST;
                    break;
            }
        }
        if($a == 'B'){ // PAPER
            switch ($b) {
                case 'X': // STONE
                    $result = self::STONE + self::LOST;
                    break;
                case 'Y': // PAPER
                    $result = self::PAPER + self::DRAW;
                    break;
                case 'Z': // SCISSORS
                    $result = self::SCISSORS + self::WON;
                    break;
            }
        }
        if($a == 'C'){ // SCISSORS
            switch ($b) {
                case 'X': // STONE
                    $result = self::STONE + self::WON;
                    break;
                case 'Y': // PAPER
                    $result = self::PAPER + self::LOST;
                    break;
                case 'Z': // SCISSORS
                    $result = self::SCISSORS + self::DRAW;
                    break;
            }
        }
        return $result;
    }

    private function hackRound($a, $b){
        $result = 0;
        if($a == 'A'){ // STONE
            switch ($b) {
                case 'X': // LOST
                    $result = self::LOST + self::SCISSORS;
                    break;
                case 'Y': // DRAW
                    $result = self::DRAW + self::STONE;
                    break;
                case 'Z': // WON
                    $result = self::WON + self::PAPER;
                    break;
            }
        }
        if($a == 'B'){ // PAPER
            switch ($b) {
                case 'X': // LOST
                    $result = self::LOST + self::STONE;
                    break;
                case 'Y': // DRAW
                    $result = self::DRAW + self::PAPER;
                    break;
                case 'Z': // SCISSORS
                    $result = self::WON + self::SCISSORS;
                    break;
            }
        }
        if($a == 'C'){ // SCISSORS
            switch ($b) {
                case 'X': // LOST
                    $result = self::LOST + self::PAPER;
                    break;
                case 'Y': // DRAW
                    $result = self::DRAW + self::SCISSORS;
                    break;
                case 'Z': // WON
                    $result = self::WON + self::STONE;
                    break;
            }
        }
        return $result;
    }

}

$example = file('example.txt');
$input = file('input.txt');

$puzzle = new Puzzle();
$firstExample = $puzzle->totalScore($example);
$firstResult = $puzzle->totalScore($input);
echo('Ejemplo 1: ' . $firstExample . PHP_EOL);
echo('Resultado 1: ' . $firstResult . PHP_EOL);
$secondExample = $puzzle->totalHackedScore($example);
$secondResult = $puzzle->totalHackedScore($input);
echo('Ejemplo 2: ' . $secondExample . PHP_EOL);
echo('Resultado 2: ' . $secondResult . PHP_EOL);