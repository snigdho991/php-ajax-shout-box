﻿<?php
 include_once "/../config/config.php";
	Class Database{
		public $host   = DB_HOST;
		public $user   = DB_USER;
		public $pass   = DB_PASS;
		public $dbname = DB_NAME;

		public $link;
		public $error;

		public function __construct(){
			$this->connectDB();
		}

		private function connectDB(){
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if(!$this->link){
				$this->error = "Database Connection Failed !".$this->link->connect_error;
			}
		}

		//Select or Read Data

		public function select($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if($result->num_rows > 0){
				return $result;
			} else {
				return false;
			}
		}

		// Insert data
		public function insert($query){
			$insert_row = $this->link->query($query) or 
			   die($this->link->error.__LINE__);
			if($insert_row){
			   header("Location: index.php?msg=".urlencode('Shout Inserted Successfully !'));
				exit();
			} else {
			   return false;
			}
		}
	}
?>