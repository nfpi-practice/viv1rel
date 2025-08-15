<?php

namespace Core\Storage;

require_once "database.php";

class Model
{
    public function __construct()
    {
        $database  = new Database();
    }
}