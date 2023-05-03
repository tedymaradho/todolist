<?php
namespace Config {
    class Database
    {
        static function getConn(): \PDO
        {
            $host = "localhost";
            $port = 3306;
            $database = "db_todolist";
            $username = "root";
            $password = "";

            return new \PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
        }
    }
}