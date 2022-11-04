<?php

class connect{
    public function __construct() 
	{
		$dsn='mysql:host=localhost;dbname=fashionshop';
		$user='root';
		$pass='';
		$this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
	}
    public function getInstance($select)
	{
		$results=$this->db->query($select);
		// echo $select;
		$result=$results->fetch();
		return $result;
	}
    public function getList($select)
	{
		$results=$this->db->query($select);
		// echo $results;
		return($results);
	}
    public function exec($query)
	{
		$results=$this->db->exec($query);
		// echo $results;
		return($results);
	}
	public function execP($query) 
	{
		$statement=$this->db->prepare($query);
		return $statement;
	}
}

?>