<?php
class Dbconfig {
    protected $serverName;
    protected $userName;
    protected $passCode;
    protected $dbName;

    function Dbconfig() {
        $this-> serverName = 'localhost';
        $this-> userName = 'root';
        $this-> passCode = 'root';
        $this-> dbName = 'budget-management';
    }
}
?>
