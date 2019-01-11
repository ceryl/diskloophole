<?php
class DbConfig
{
    private $_host = 'localhost';
    private $_username = 'u31286p25829';
    private $_password = 'tqcWD0Rg';
    private $_database = 'u31286p25829_testFrame';

    protected $connection;

    public function __construct()
    {
        if (!isset($this->connection)) {

            $this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

            if (!$this->connection) {
                echo 'Cannot connect to database server';
                exit;
            }
        }

        return $this->connection;
    }
}
