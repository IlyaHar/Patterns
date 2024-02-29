<?php

abstract class Button
{
    protected string $html;
    public function getHtml(): string
    {
        return $this->html;
    }
}

class InputButton extends Button
{
    protected string $html = "<input type='submit' value='InputButton' />";
}

class DivButton  extends Button
{
    protected string $html = "<div>DivButton</div>";
}

class FlashButton extends Button
{
    protected string $html = "<button>FlashButton</button>";
}

class RedButton  extends Button
{
    protected string $html = "<input type='submit' value='InputButton' style='background: red' />";
}

class GreenButton extends Button
{
    protected string $html = "<button  style='background: green'>FlashButton</button>";
}


class FactoryButton
{
    public static function create(string $type): object
    {
        $base = 'Button';
        $target = ucfirst($type) . $base;

        if (class_exists($target) && is_subclass_of($target, $base)) {
            return new $target;
        } else {
            throw new Exception('Вы ввели не корректные данные');
        }
    }
}

$buttons = ['div', 'flash', 'input', 'red', 'green'];

foreach ($buttons as $button) {
    echo FactoryButton::create($button)->getHtml();
    echo PHP_EOL ;
}

//echo FactoryButton::create('green')->getHtml();


/*
 * Благодаря паттерну Фабричный метод (Factory Method) не нужно для каждого класса создавать отдельный обьект,
 * За счет класса FactoryMethod можно создать лишь один обьект. И при этом создать много различных обьектов.
 */