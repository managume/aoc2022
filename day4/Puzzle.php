<?php
namespace Day4;

class Puzzle
{
    public function __invoke()
    {
        $input = file(__DIR__ . '/input.txt');
        echo ("El primer resultado es: " . self::countFullyIntersections($input) . PHP_EOL);
        echo ("El segundo resultado es: " . self::countOverlappingPairs($input) . PHP_EOL);
    }
    public function countFullyIntersections(array $input): int
    {
        $fullyIntersections = 0;
        foreach ($input as $line) {
            $pairs = self::getPairs(trim($line));
            if (
                sizeof(
                    array_diff(
                        $pairs[0],
                        $pairs[1]
                    )
                ) == 0 or
                sizeof(
                    array_diff(
                        $pairs[1],
                        $pairs[0]
                    )
                ) == 0
            ) {
                $fullyIntersections++;
            }
        }
        return $fullyIntersections;
    }
    public function countOverlappingPairs(array $input): int
    {
        $overlappedPairs = 0;
        foreach ($input as $line) {
            $pairs = self::getPairs(trim($line));
            if(sizeOf(array_intersect($pairs[0],$pairs[1])) != 0)
            {
                $overlappedPairs++;
            }

        }
        return $overlappedPairs;
    }
    private function getPairs(string $line): array
    {
        $unformattedPairs = explode(',', $line);
        $unformattedPair1 = explode('-', $unformattedPairs[0]);
        $unformattedPair2 = explode('-', $unformattedPairs[1]);
        $pairs = [];
        $pairs[0] = range($unformattedPair1[0], $unformattedPair1[1]);
        $pairs[1] = range($unformattedPair2[0], $unformattedPair2[1]);
        return $pairs;
    }
}