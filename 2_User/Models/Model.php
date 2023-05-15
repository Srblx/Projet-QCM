<?php

class Model
{
    private $db;
    private static $instance = null;

    private function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=qcm";
        $username = "root";
        $password = "";
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );
        $this->db = new PDO($dsn, $username, $password, $options);
    }

    public static function get_instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    public function get_database()
    {
        return $this->db;
    }
}
