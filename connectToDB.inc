<?php

function connectDB(){
	$dbConnection = mysqli_connect("sql304.epizy.com","epiz_29507824","TKiNcSS1UvTF9V", "epiz_29507824_movies");
	if (mysqli_connect_errno()){
		die(mysqli_connect_error());
	}
	return $dbConnection;
}


?>