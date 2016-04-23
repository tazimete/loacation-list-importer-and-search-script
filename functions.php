
<?php 
	

		//FOR DB Connection
		function db_connect(){
			$host="localhost";
			$user="root";
			$pass="";
			$DB="country_info";

			$MC=mysql_connect($host, $user, $pass) or die('Error !!!  Unable to Connect !!!!!..........');
			mysql_select_db($DB);
			
		}

		//FOR DB Closing
		function db_close(){
			
			mysql_close();
		}
	
	
	
	
?>