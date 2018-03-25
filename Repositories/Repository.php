<?php
class Repository
{
    public $conn;

    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "social_media";
        $this->conn = new mysqli($servername, $username, $password, $dbname);
    }
}
?>
