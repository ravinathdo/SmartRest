<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getDBConnection() {
    /* */
      $servername = "localhost";
      $username = "root";
      $password = "123";
      $db = "erest_db";
     

	/* 000webhost
     $servername = "localhost";
    $username = "id1080794_ravinathdo";
    $password = "123@com";
    $db = "id1080794_erest_db";
	*/

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}
?>

