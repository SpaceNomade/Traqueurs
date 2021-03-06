<?php
namespace App\Core;

class App {
    const DB_NAME = 'traqueurs';
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '';

    private static $database;

    public static function getDatabase(){
        if(self::$database === null){
            self::$database = new Database(self::DB_NAME, self::DB_HOST, self::DB_USER, self::DB_PASS);
        }

        return self::$database;
    }
}