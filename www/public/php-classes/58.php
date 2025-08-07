<?php

interface iFile
{
    public function __construct($filePath);

    public function getPath(); // путь к файлу
    public function getDir();  // папка файла
    public function getName(); // имя файла
    public function getExt();  // расширение файла
    public function getSize(); // размер файла

    public function getText();          // получает текст файла
    public function setText($text);     // устанавливает текст файла
    public function appendText($text);  // добавляет текст в конец файла

    public function copy($copyPath);    // копирует файл
    public function delete();           // удаляет файл
    public function rename($newName);   // переименовывает файл
    public function replace($newPath);  // перемещает файл
}

class File implements iFile
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getPath()
    {
        return $this->filePath;
    }

    public function getDir()
    {
        return pathinfo($this->filePath, PATHINFO_DIRNAME);
    }

    public function getName()
    {
        return pathinfo($this->filePath, PATHINFO_FILENAME);
    }

    public function getExt()
    {
        return pathinfo($this->filePath, PATHINFO_EXTENSION);
    }

    public function getSize()
    {
        return filesize($this->filePath);
    }

    public function getText()
    {
        return " " . file_get_contents($this->filePath);
    }

    public function setText($text)
    {
        file_put_contents($this->filePath, $text);
        return $this;
    }

    public function appendText($text)
    {
        file_put_contents($this->filePath, $text, FILE_APPEND);
        return $this;
    }

    public function copy($copyPath)
    {
        copy($this->filePath, $copyPath);
        return new File($copyPath);
    }

    public function delete()
    {
        unlink($this->filePath);
        return $this;
    }

    public function rename($newName)
    {
        $newPath = $newName;
        rename($this->filePath, $newPath);
        $this->filePath = $newPath;
        return $this;
    }

    public function replace($newPath)
    {
        rename($this->filePath, $newPath);
        $this->filePath = $newPath;
        return $this;
    }
}

$file = new File('58.txt');

$file->setText("Hello, World!");

$file->appendText(" appendText");

echo "Path: " . $file->getPath() . "<br>";
echo "Directory: " . $file->getDir() . "<br>";
echo "Name: " . $file->getName() . "<br>";
echo "Extension: " . $file->getExt() . "<br>";
echo "Size: " . $file->getSize() . "<br>";
echo "Content:" . $file->getText() . "<br>";

$copiedFile = $file->copy('58_copy.txt');
echo "Скопировано в: " . $copiedFile->getPath() . "<br>";

$file->rename('58_renamed.txt');
echo "Переименовано в: " . $file->getPath() . "<br>";

$file->replace('moved/58_renamed.txt');
echo "Перемещено в: " . $file->getPath() . "<br>";

$file->delete();
echo "Файл удалён";