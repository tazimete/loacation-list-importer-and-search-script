
<?php include('header.php'); ?>
<?php include('functions.php'); ?>

<div class="search-form-container"> 

	<input name="search-input" type="text" id="search-input-text" class="input-text" placeholder="Search Location"/> 
	
	<div class="auto-complete-box">
	<ul id="auto-complete-ul">
		
	</ul>
	</div>
</div>

<div class="auto-loader">
	<div class="loader-img-container">
		<img src="img/loader.gif" alt="Loading......" class="loader-img" />
	</div>
</div>

<?php include('footer.php'); ?>