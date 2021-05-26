<?php

/*  NOTE:
    The version of this file demonstrated in class 10/18 failed to work 
    correctly, because I was using the variable $to_insert for multiple
    sets of insertions without clearing it in between.  Thus, the insertion 
    statements continued to accumulate.  The solution is to:
        unset($to_insert);
    after each set to make sure that a new array is used for each.
    Thanks to Emmanuel who was the first of several students to alert me
    to the issue.
*/    
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
//////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////
//read a sql file
$query = file_get_contents("./insert_into.sql");

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
             printf("-----------------\n");
        }
    } while ($conn->next_result());
}
        
//////////////////////////////////////////////////////////////////////////
        
mysqli_close($conn); // DO NOT FORGET TO CLOSE THE CONNECTION!!!
?>
