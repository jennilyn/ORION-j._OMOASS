<?php
	class BASEDAO{
		protected $user="root";
		protected $pass="";
		protected $dbname="y";
		protected $dbh=null;

	   function openConn(){
	 		$this->dbh=new PDO("mysql:host=localhost;dbname=".$this->dbname, $this->user, $this->pass);
	   }

	   function closeConn(){
	 		$this->dbh=null;
	   }
	}
?>
