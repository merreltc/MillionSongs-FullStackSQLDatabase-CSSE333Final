<?php
	$song = $_GET['song_val'];
	$artist = $_GET['artist_val'];
	$genre = $_GET['genre_val'];
	$album = $_GET['album_val'];
	$year = intval($_GET['year_val']);

	$con = mysqli_connect('localhost','superuser','superP@$$123','testdb');
	if (!$con) {
		die('Could not connect: ' . mysqli_error($con));
	}

	mysqli_select_db($con,'projecttest');

	// Check for song in database first
	$sql="START TRANSACTION;";
	mysqli_query($con,$sql);

	$sql="INSERT INTO `Update-Song` (title, artist, genre, album, release_year) VALUES('".$song."', '".$artist."', '".$genre."', '".$album."', '".$year."');";
	mysqli_query($con,$sql);

	$sql="COMMIT;";
	if (mysqli_query($con,$sql)) {
		echo "<p>Song update pending, please wait approx. 72 hours for song to appear on the site.</p>";
	} else {
		echo "<p>Error updating song: ".mysqli_error($con)." Please try again or contact us.</p>";
	}

	mysqli_close($con);
?>