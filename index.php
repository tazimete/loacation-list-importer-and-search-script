
	
<?php include('header.php'); ?>
<?php include('functions.php'); ?>

<?php
//Upload File
if (isset($_POST['submit-csv'])) {
	
		$csv_mimetypes = array(
			'text/csv',
			'text/plain',
			'application/csv',
			'text/comma-separated-values',
			'application/excel',
			'application/vnd.ms-excel',
			'application/vnd.msexcel',
			'text/anytext',
			'application/octet-stream',
			'application/txt',
		);
	
	if (is_uploaded_file($_FILES['csv']['tmp_name'])) {
		
		if(in_array($_FILES['csv']['type'], $csv_mimetypes)){
			echo "<h1>" . "File ". $_FILES['csv']['name'] ." uploaded successfully." . "</h1>";
			echo "<h2>Impoprting data...........</h2>";
			echo '<div class="search-box-container">
			<a href="search.php" class="search-box btn-primary ">Search</a>
			</div>';
		//readfile($_FILES['csv']['tmp_name']);
		} else {
		  die("Invalid file type!!! Please upload only CSV file...........");
		}
	} else {
		  die("Invalid file type!!! Please upload only CSV file...........");
		}

	//Import uploaded file to Database
	$handle = fopen($_FILES['csv']['tmp_name'], "r");
	
	db_connect();
	
	$i = 1;
	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		
		$location = mysql_real_escape_string (trim(substr(trim($data[0]),2)));
		$population = filter_var (trim($data[1]), FILTER_SANITIZE_NUMBER_INT);
		$population = mysql_real_escape_string (str_replace(array('+','-'), '', trim($population)));
		$slug = trim(mysql_real_escape_string (preg_replace('/\d/', '', trim($data[1]))));
		
		$import="INSERT IGNORE into population(location,slug,population) values('$location','$slug','$population')";

		mysql_query($import) or die(mysql_error());
		
		echo $i."-----".$location."---------".$slug."-------".$population."<br>";
		$i++;
	}
	
	db_close();

	fclose($handle);

	echo "<h2>Data imported successfully......</h2>";

	//view upload form
}else { ?>

<div class="form-container"> 
	<h1>
	Select and submit CSV file to import data : 
	</h1>
		
	<form action="index.php" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
		<input name="csv" type="file" id="csv" /> 
		<input type="submit" name="submit-csv" value="submit" /> 
	</form> 
</div>

<div class="search-box-container">
	<a href="search.php" class="search-box btn-primary ">Search</a>
</div>

<?php 
	
}

?>


<?php include('footer.php'); ?>
	