<?php

class First
{
    public function first_sum($a, $b): int
    {
        return $a + $b;
    }
}

class Second
{
    public function second_sum($a, $b): int
    {
        return $a + $b;
    }
}

$result = new First();
echo $result->first_sum(5, 5);

echo PHP_EOL;

$result2 = new Second();
echo $result2->second_sum(10, 10);

echo PHP_EOL;

/*
 * Проблема данного кода в том, что есть два класа с одинаковыми методами но названия при этом разные,
 * а хотело бы что бы у этих методов было общее название, для этого можно использывать паттерн Адаптер (Adapter)
 */