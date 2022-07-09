<?php include_once('conn.php'); ?>
<?php 
	if (count($error)>0) {
		foreach ($error as $errors) {
			echo $errors;
		}
	}

 ?>