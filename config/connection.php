<?php

include '../config/env.php';

class Mysql extends Dbconfig {

    public $connection;
    public $dataSet;
    private $sqlQuery;
    
    protected $databaseName;
    protected $hostName;
    protected $userName;
    protected $passCode;

    function Mysql() {
        $this->connection = NULL;
        $this->sqlQuery = NULL;
        $this->dataSet = NULL;

        $dbParams = new Dbconfig();
        $this->databaseName = $dbParams->dbName;
        $this->hostName = $dbParams->serverName;
        $this->userName = $dbParams->userName;
        $this->passCode = $dbParams->assCode;
        $dbParams = NULL;
    }
  
    function dbConnect()    {        
        $pdo = new PDO("mysql:host={$this->hostName};dbname={$this->databaseName}", $this->userName, $this->passCode);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->connection = $pdo;
        return $this->connection;
    }

    function dbDisconnect() {
        $this->connection = NULL;
        $this->sqlQuery = NULL;
        $this->dataSet = NULL;
        $this->databaseName = NULL;
        $this->hostName = NULL;
        $this->userName = NULL;
        $this->passCode = NULL;
    }

    function selectAll($tableName)  {
        $this->sqlQuery = "SELECT * FROM {$this->databaseName}.$tableName"; 
        $this->dataSet = $this->connection->query($this->sqlQuery)->fetch();;
        return $this->dataSet;
    }

    function selectWhere($tableName,$rowName,$operator,$value,$valueType)   {
        $this->sqlQuery = 'SELECT * FROM '.$tableName.' WHERE '.$rowName.' '.$operator.' ';
        if($valueType == 'int') {
            $this->sqlQuery .= $value;
        }
        else if($valueType == 'char')   {
            $this->sqlQuery .= "'".$value."'";
        }
        $this->dataSet = $this->connection->query($this->sqlQuery)->fetch();;
        $this->sqlQuery = NULL;
        return $this->dataSet;
    }


    function insertInto($tableName,$values) {
        $i = NULL;

        $this->sqlQuery = 'INSERT INTO '.$tableName.' VALUES (';
        $i = 0;
        while($values[$i]["val"] != NULL && $values[$i]["type"] != NULL) {
            if($values[$i]["type"] == "char") {
                $this->sqlQuery .= "'";
                $this->sqlQuery .= $values[$i]["val"];
                $this->sqlQuery .= "'";
            }
            else if($values[$i]["type"] == 'int') {
                $this->sqlQuery .= $values[$i]["val"];
            }
            $i++;
            if($values[$i]["val"] != NULL)  {
                $this->sqlQuery .= ',';
            }
        }
        $this->sqlQuery .= ')';
        $this->connection->query($this->sqlQuery)->fetch();
        return $this->sqlQuery;
    }

    function selectFreeRun($query) {
        $this->dataSet = $this->connection->query($query)->fetch();        
        return $this->dataSet;
    }

    function freeRun($query) {
        return $this->connection->query($query)->fetch();
    }
}
?>
