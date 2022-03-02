<?php 

$koneksi = new mysqli("localhost", "root", "", "laundry3");

function query($query) {
	global $koneksi;
	$result = $koneksi->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) {
		$rows[] = $row;
	}
	return $rows;
}

?>