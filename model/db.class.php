<?php

class Db
{

    private static $username = 'root';
    private static $password = "";
    private static $instance;


    public static function getInstance()
    {

        if (!self::$instance) {
            self::$instance = new PDO("mysql:host=localhost; dbname=rss", self::$username, self::$password);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$instance;

    }

}

