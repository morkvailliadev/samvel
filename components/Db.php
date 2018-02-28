<?php

/**
 * Class Db
 * Component for working with database
 */
class Db
{

    /**
     * Establishes a connection to the database
     * @return \PDO <p>Object of class PDO for working with DB</p>
     */
    public static function getConnection()
    {
        // Get the connection parameters from a file

        // Set the connection
        $dsn = "mysql:host=" . DB_HOST .";dbname=" . DB_NAME ;
        $db = new PDO($dsn, DB_USER, DB_PASSWORD);

        // Specify the encoding
        $db->exec("set names utf8");

        return $db;
    }

}
