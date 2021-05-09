<?php
include "database.php";
// check if form is submited using the isset function
if(isset($_POST['submit'])) {
	// normally we cout just set the code as $_POST['user'], but it is better we use a string,
	//therefore we use $user=$_POST['user'] then we add the msqli real escape command to strip 
	//the code off any excesses and always do not forget to include yout connection string along side

	$user = mysqli_real_escape_string($conn,$_POST['user']);
	$message = mysqli_real_escape_string($conn,$_POST['message']);
	// step 1 :the mysqli_real_escape_string will help to strip the code of any harmful html tags submitted

       	// We now set it to populate the query row in our database using the code below NB same comma order should be followed in both places
       	$query = "INSERT INTO shouts (user,message)VALUES('$user','$message');";
       	// Else, if it didnt insert we use the !mysqli_connect funtion to ascertain 
       	if (!mysqli_query($conn, $query)) {
       		die('Error:'.mysqli_error($conn));
       	}
       	// Else redirect us back to our index page
       	else {
       		header("Location: index.php");
       		exit();
       	}
       }

 ?>