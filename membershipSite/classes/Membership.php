<?php
require 'Mysql.php';


class Membership{
	
	function validate_user($un, $pwd){
		$mysql = New Mysql();
		$ensure_credentials = $mysql->verify_Username_and_Pass($un, md5($pwd));
		if($ensure_credentials){
			$_SESSION['status'] ='authorized';
			header("location: index.php");
		}
		 else return "Please enter a correct username and password";
		
	}
}


