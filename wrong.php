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

$inputButton = new InputButton();
echo $inputButton->getHtml();

echo PHP_EOL;

$divButton = new DivButton();
echo $divButton->getHtml();

echo PHP_EOL;

$flashButton = new FlashButton();
echo $flashButton->getHtml();

echo PHP_EOL;

/*
 * Казалось бы вроде бы все отлично кнопки создаются и все супер, но если представить что таких кнопок может быть еще 10,
 * то для каждой кнопки нужно будет создавать обьект и выводить ее и получится очень много кода...
 * Что бы решить данную проблему, можно использывать шаблон проектирования Фабричный Метод (Factory Method)
 */