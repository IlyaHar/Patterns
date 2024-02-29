<?php
trait TAdapter
{
    public function sum($a, $b)
    {
        $method = $this->method;
        return $this->$method($a, $b);
    }
}

class First
{
    use TAdapter;
    public $method = 'first_sum';

    public function first_sum($a, $b): int
    {
        return $a + $b;
    }
}

class Second
{
    use TAdapter;
    public $method = 'second_sum';

    public function second_sum($a, $b): int
    {
        return $a + $b;
    }
}

$result = new First();
echo $result->sum(5, 5);

echo PHP_EOL;

$result2 = new Second();
echo $result2->sum(10, 10);

echo PHP_EOL;


/*
 * Благодаря шаблону проектирования Адаптер (Adapter) при вызове двух разных обьектов можно вызвать общий метод для обоих классов.
 */