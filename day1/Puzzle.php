<?php

namespace Day1;
class Puzzle
{
    public function __invoke($input)
    {
        echo ("El primer resultado es: " . self::maxCaloriesPerElf($input) . PHP_EOL);
        echo ("El segundo resultado es: " . self::topThreeMaxCaloriesPerElf($input) . PHP_EOL);
    }
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