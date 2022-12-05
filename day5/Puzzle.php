<?php
namespace Day5;

class Puzzle
{
    public function __invoke()
    {
        $input = file(__DIR__ . '/input.txt');
        echo ("El primer resultado es: " . self::rearrangeStacks($input) . PHP_EOL);
        echo ("El segundo resultado es: " . self::multipleRearrange($input) . PHP_EOL);
    }
    public function rearrangeStacks(array $input): string
    {
        $procedure = self::getProcedure($input);
        $stacks = $procedure['stacks'];
        $movements = $procedure['movements'];
        foreach ($movements as $movement) {
            for ($i = intval($movement['move']); $i > 0 ; $i--) {
                $el = array_shift($stacks[$movement['from']-1]);
                array_unshift($stacks[$movement['to']-1], $el);
            }
        }
        $top = '';
        foreach ($stacks as $stack) {
            $top .= (string) array_shift($stack);
        }
        return $top;
    }

    public function multipleRearrange(array $input): string
    {
        $procedure = self::getProcedure($input);
        $stacks = $procedure['stacks'];
        $movements = $procedure['movements'];
        foreach ($movements as $movement) {
            $els = array_splice($stacks[$movement['from']-1],0,$movement['move'],[]);
            $stacks[$movement['to']-1] = array_merge($els,$stacks[$movement['to']-1]);
        }
        $top = '';
        foreach ($stacks as $stack) {
            $top .= (string) array_shift($stack);
        }
        return $top;
    }
    private function getProcedure(array $input): array
    {
        $procedure = [
            "stacks" => [],
            "movements" => []
        ];
        $stacks = [];
        $movements = [];
        $stackCounter = 0;
        foreach ($input as $line) {
            if (str_starts_with(trim($line), '[') or str_starts_with(trim($line), '1')) {
                $stacks[] = str_split($line);
            }
            if (str_starts_with(trim($line), 'move')) {
                $movement = explode(' ', trim($line));
                $procedure['movements'][] = [
                    $movement[0] => $movement[1],
                    $movement[2] => $movement[3],
                    $movement[4] => $movement[5],
                ];
            }
        }
        foreach (end($stacks) as $key => $value) {
            if(is_numeric($value)){
                $procedure['stacks'][$value - 1] = array_column($stacks, $key);
                array_pop($procedure['stacks'][$value - 1]);
            }
        }
        foreach($procedure['stacks'] as $key => $stack){
            $procedure['stacks'][$key] = array_filter($stack, fn($value) => $value != " ");
        }
        return $procedure;
    }
}