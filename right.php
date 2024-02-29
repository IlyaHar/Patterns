<?php

interface IFiles
{
    public function createFile(string $file);
}

class ZipFile implements IFiles
{
    public string $file;

    public function createFile(string $file): void
    {
        $this->file = "$file.zip";
    }
}

class TarGzFile implements IFiles
{
    public string $file;

    public function createFile(string $file): void
    {
        $this->file = "$file.tar.gz";
    }
}

class ContextFiles
{
    private IFiles $strategy;

    public function __construct(IFiles $strategy)
    {
        $this->strategy = $strategy;
    }

    public function create(string $file)
    {
        $this->strategy->createFile($file);
    }

    public function showFile(): string
    {
        return $this->strategy->file;
    }
}

if (strstr($_SERVER["HTTP_USER_AGENT"], "Win")) {
    $obj = new ContextFiles(new ZipFile());
} else {
    $obj = new ContextFiles(new TarGzFile());
}

$obj->create('newFile');
echo $obj->showFile();

/*
 * Благодаря шаблону проектирования 'Стратегия' код не повторяется, а так же можно использывать одну и ту же переменную для создания обьекта.
 * И по сколько вызывается один и тот же обьект методы будут одинаковые. В конструктор одного и того же обьекта передается обьект других классов.
 */
