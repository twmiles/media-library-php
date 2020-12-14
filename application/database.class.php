<?php

/*
 * Author: Louie Zhu
 * Date: Jan 22, 2016
 * File: database,class.php
 * Description: the Database class sets parameters for connecting to the MySQL server and 
 *       methods that return the connection object and table names.
 * 
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'i211_kungfupanda_db',
        'tblMovie' => 'movies',
		'tblMovieRating' => 'movie_ratings',
        'tblBook' => 'books',
        'tblGame' => 'games',
        'tblCD' => 'cds'

    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //private constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
                        $this->param['host'],
                        $this->param['login'],
                        $this->param['password'],
                        $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            header("Location:" . BASE_URL . "/show_error.php?eMsg=" . $message);
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table that stores movies
    public function getMovieTable() {
        return $this->param['tblMovie'];
    }
    
    //returns the name of the table storing movie ratings
    public function getMovieRatingTable() {
        return $this->param['tblMovieRating'];
    }
	
    //returns the name of the table that stores books
    public function getBookTable() {
        return $this->param['tblBook'];
    }

    //returns the name of the table storing games
    public function getGameTable() {
        return $this->param['tblGame'];
    }
    
    //returns the name of the table storing cds
    public function getCDTable() {
        return $this->param['tblCD'];
    }
}