<?php

class Manager
{
    public  function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=mini_blog;charset=utf8','root','root');
        return $db;
    }
}