<?php

class PuzzleOne
{
    public function maxCaloriesPerElf($input)
    {
        return max(self::calculateCaloriesPerElf($input));
    }

    public function topThreeMaxCaloriesPerElf($input)
    {
        $calories = self::calculateCaloriesPerElf($input);
        rsort($calories);
        return $calories[0] + $calories[1] + $calories[2];
    }
    private function calculateCaloriesPerElf($input)
    {
        $elvesCalories = array();
        $elvesCounter = 0;
        foreach ($input as $value) {
            if ($value != "\n" && !array_key_exists($elvesCounter, $elvesCalories)) {
                $elvesCalories[$elvesCounter] = $value;
            } elseif ($value != "\n" && array_key_exists($elvesCounter, $elvesCalories)) {
                $elvesCalories[$elvesCounter] += $value;
            } else {
                $elvesCounter++;
            }
        }
        return $elvesCalories;
    }
}
$input = file('./input.txt');
$puzzle = new PuzzleOne();
echo ("El mayor número de calorías es: " . $puzzle->maxCaloriesPerElf($input) . PHP_EOL);
echo ("El total de calorías resultante de sumar las tres mayores cantidades es: " . $puzzle->topThreeMaxCaloriesPerElf($input) . PHP_EOL);