<?php

class Connection extends PDO {
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=id20940959_currency_converter;charset=utf8';

        try {
            parent::__construct($dsn, 'id20940959_root', 'tV5zwZ%x6pDCB01G');
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
}
?>