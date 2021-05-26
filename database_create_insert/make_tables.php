<?php
$host = "localhost";
$username = "root";
$password = "root";
$database_name = 'firstedu';
$port = 3307;


// Create connection
$conn = mysqli_connect("$host:$port", $username, $password,$database_name);




// Check connection
if (mysqli_connect_errno()):
  printf("connect failes: $s\n",mysqli_connect_error());
  exit();
endif;

//read a sql file
$query = file_get_contents("./create_tables.sql");
// $query ="CREATE DATABASE menagerie";
echo "after query";
// echo $query;


if ($conn->multi_query($query)) {
    do {
        /* store first result set */
        if ($result = $conn->store_result()) {
             while ($row = $result->fetch_row()) {
                 printf("%s\n", $row[0]);
            }
             $result->free();
        }
        /* print divider */
        if ($conn->more_results()) {
             printf("---------kkk--------\n");
        }
    } while ($conn->next_result());
}
    
/* close connection */
$mysqli->close();


    ?>