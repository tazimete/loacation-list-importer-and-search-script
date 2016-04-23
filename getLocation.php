

<?php include('functions.php'); ?>
	
<?php

if(isset($_GET['keyword']) && !empty($_GET['keyword'])){

	$keyword = $_GET['keyword'];
	db_connect();
	$data = array();
	$location_sql = "SELECT * FROM population WHERE location LIKE '$keyword%' ORDER BY population DESC LIMIT 10";
	$query_location_sql = mysql_query($location_sql) or die(mysql_error()); 
	
	while ($obj = @mysql_fetch_object($query_location_sql)){
		array_push($data, $obj);
		//echo '<li class="location-list">'.$obj->location.'----'.$obj->population.'</li>';
		
	}
	
	db_close(); 
	echo json_encode($data);
	//print_r($data);
}

?>


