<?php
interface IFiles
{
    public function createFile(string $file);
    public function showFile();
}

class ZipFile implements IFiles
{
    private string $file;

    public function createFile(string $file): void
    {
        $this->file = "$file.zip";
    }

    public function showFile(): string
    {
        return $this->file;
    }
}

class TarGzFile implements IFiles
{
    private string $file;

    public function createFile(string $file): void
    {
        $this->file = "$file.tar.gz";
    }

    public function showFile(): string
    {
        return $this->file;
    }
}

if (strstr($_SERVER["HTTP_USER_AGENT"], "Win")) {
    $obj1 = new ZipFile();
    $obj1->createFile('newFile1');
    echo $obj1->showFile();
} else {
    $obj2 = new TarGzFile();
    $obj2->createFile('newFile2');
    echo $obj2->showFile();
}

/*
 * Проблема данного кода в том, что код повторяется и что бы это проблему решить нужно использывать шаблон проектирования Cтратегия (Strategy).
*/




