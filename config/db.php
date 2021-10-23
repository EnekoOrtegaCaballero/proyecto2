<?php

class Database{
    public static function connect(){



        $server = '82.223.113.64';
        $username = 'qafq855';
        $database = 'qafq855';
        $password = '**********';
    
        $db = new mysqli($server, $username, $password, $database);

        $db->query("SET NAMES 'utf8'");
        return $db; 

    }
}
