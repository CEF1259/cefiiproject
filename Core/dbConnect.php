<?php
namespace cefiiproject\Core;

use PDO;
use Exception;

class dbConnect 
{
    protected $connection;
    protected $request;

    
     //for the actual school server
     /*
     const SERVER = "sqlprive-pc2372-001.eu.clouddb.ovh.net:35167";
     const USER = "cefiidev1259";
     const PASSWORD = "S4d4hu2F";
     const BASE = "cefiidev1259";*/
     

     
    //credentials for localhost for testing purposes, comment out later
    const SERVER = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const BASE = "cefiiproject";

    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host='.self::SERVER.';dbname=' . self::BASE, self::USER, self::PASSWORD);
            
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            //sets special characters to utf8
            $this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
        }
        catch (Exception $e) 
        {
            die("Error : " . $e->getMessage());
        }
    }
}

?>