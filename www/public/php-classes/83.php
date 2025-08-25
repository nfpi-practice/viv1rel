<?php
class FileManipulator
{
    public function create($filePath)
    {
        file_put_contents($filePath, '');
    }

    public function delete($filePath)
    {
        unlink($filePath);
    }

    public function copy($filePath, $copyPath)
    {
        copy($filePath, $copyPath);
    }

    public function rename($filePath, $newName)
    {
        rename($filePath, pathinfo($filePath, PATHINFO_DIRNAME) . "/" . $newName);
    }

    public function replace($filePath, $newPath)
    {
        rename($filePath, $newPath);
    }

    public function weigh($filePath)
    {
        return filesize($filePath);
    }
}

$file = new FileManipulator();

$file->create('83/f1.txt');
file_put_contents('83/f1.txt', 'data');

$file->copy('83/f1.txt', "83/f2.txt");
$file->delete('83/f2.txt');
$file->rename('83/f1.txt', 'f2.txt');
print_r($file->weigh('83/f2.txt'));