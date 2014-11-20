<?php

session_start();

class Connection extends PDO 
{
	private $dsn = 'mysql:dbname=pw2;host=162.243.116.71;charset=utf8';
	private $user = 'root';
	private $password = 'DevAgile';
	public $handle = null;

function __construct( ) {
	try {
		if ( $this->handle == null ) {
			$dbh = parent::__construct( $this->dsn , $this->user , $this->password );
			$this->handle = $dbh;
			return $this->handle;
		}
	} catch ( PDOException $error ) {
		echo 'Connection failed: ' . $error->getMessage( );
		return false;
	}
}

function __destruct( ) {
	$this->handle = NULL;
	}
}

?>