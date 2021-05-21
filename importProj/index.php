<?php
$host = "localhost";
$username = "root";
$password = "root";
$database_name = 'firstedu';


// Create connection
$conn = mysqli_connect($host, $username, $password,$database_name);

// Check connection
if (mysqli_connect_errno()):
  printf("connect failes: $s\n",mysqli_connect_error());
  exit();
endif;

//read file after choosing file
if(isset($_POST['sub'])){
    var_dump($_FILES['file']);
    
    $myfile2 = fopen($_FILES['file']['tmp_name'], "r") or die("Unable to open file!");
    while(!feof($myfile2)) {
           $value =fgets($myfile2) ;
           echo $value;
           $sql = "INSERT INTO people (firstname, lastname, age)
             VALUES (".$value.")";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
                } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
    }

    
}



//  read file
 
// $myfile2 = fopen("csv.txt", "r") or die("Unable to open file!");

// //insert to table in database
// while(!feof($myfile2)) {
//         $value =fgets($myfile2) ;

// $sql = "INSERT INTO people (firstname, lastname, age)
// VALUES (".$value.")";

// if (mysqli_query($conn, $sql)) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }
// }

// now expoert
if(isset($_POST['exp'])){
    //now read from database
    // first write the query 
    //second connect to database to get it
    // i use mysqli procedural

    $sql = "SELECT id, firstname, lastname FROM people";
    $result = mysqli_query($conn, $sql);

    $myfile = fopen("intext.txt", "a") or die("Unable to open file!");

    if (mysqli_num_rows($result) > 0) {
         // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

            //write into the file
            
            $txt = $row["id"]. $row["firstname"].$row["lastname"].$row["age"] ;
            echo "<br>";
            fwrite($myfile, $txt);
            

        }
    } else {
        echo "0 results";
    }

}//end of if exp check clikced
   

mysqli_close($conn);
  fclose($myfile2);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>import form</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="sub" value="Import">
    
    </form>

    <form action="" method="POST">
        <input type="submit" name="exp" value="EXport">
    </form>
</body>
</html>
