<?php

namespace App\Base;

class Database{
    
    private static $db = null; // Единственный экземпляр класса, чтобы не создавать множество подключений
    private $mysqli;

    private function __construct()
    {
        $this->mysqli = new \mysqli('localhost', 'root', '', 'blog');
        $this->mysqli->query("SET lc_time_names = 'ru_RU'");
        $this->mysqli->query("SET NAMES 'utf8'");
    }

    public static function connect(){
        if(self::$db == null) self::$db = new Database();
        return self::$db;
    }

    public function selectAll(){
        $res = $this->mysqli->query('SELECT * FROM articles');
        return $res->fetch_all(MYSQLI_ASSOC);
    }
    
    public function insert($item){
        //$str implode
        $res = $this->mysqli->query('INSERT INTO products ($columns) VALUES ($values)');
    }
    
}