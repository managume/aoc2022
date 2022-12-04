<?php
namespace Day3;

class Puzzle
{
    public function __invoke()
    {
        $input = file(__DIR__ . '/input.txt');
        echo ("El primer resultado es: " . self::getSumItemTypesPriorities($input) . PHP_EOL);
        echo ("El segundo resultado es: " . self::getSumGroupsPriorities($input) . PHP_EOL);
    }
    public function getSumItemTypesPriorities($input)
    {
        $priorities = 0;
        foreach ($input as $rucksack) {
            $rucksack = str_split(trim($rucksack));
            $compartment1 = array_slice($rucksack, 0, (sizeof($rucksack) / 2));
            $compartment2 = array_slice($rucksack, (sizeof($rucksack) / 2), sizeof($rucksack));
            $compartmentsIntersection = array_intersect($compartment1, $compartment2);
            $commonItem = array_pop($compartmentsIntersection);
            $priorities += self::getLetterPosition($commonItem);
        }
        return $priorities;
    }

    public function getSumGroupsPriorities(array $input): int
    {
        $sumPriorities = 0;
        for ($i = 0; $i < sizeof($input); $i = $i + 3) {
            $rucksack1 = str_split(trim($input[$i]));
            $rucksack2 = str_split(trim($input[$i + 1]));
            $rucksack3 = str_split(trim($input[$i + 2]));

            $rucksacksIntersection = array_intersect($rucksack1, $rucksack2, $rucksack3);
            $commonItem = array_pop($rucksacksIntersection);
            $sumPriorities += self::getLetterPosition($commonItem);
        }
        return $sumPriorities;
    }
    private function getLetterPosition(string $letter): int
    {
        $lowercase = range('a', 'z');
        $uppercase = range('A', 'Z');

        if (array_search($letter, $lowercase)) {
            return array_search($letter, $lowercase) + 1;
        } else {
            return array_search($letter, $uppercase) + 1 + sizeof($lowercase);
        }
    }
}