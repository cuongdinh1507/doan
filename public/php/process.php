<?php 

	header('Content-Type: application/json');

	$input = filter_input_array(INPUT_POST);

	$mysqli = new mysqli('localhost', 'root', '', 'hydroshare',3306);

	if (mysqli_connect_error()) {
	  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
	  exit;
	}
	else
		echo "Thanh cong";

 ?>