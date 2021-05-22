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

// $user = 'root';
// $password = 'root';
// $db = 'firstedu';
// $host = 'localhost';
// $port = 3307;

// $link = mysqli_connect(
//    "$host:$port", 
//    $user, 
//    $password
// );
// $db_selected = mysqli_select_db(
//    $db, 
//    $link
// );

// check submit button clicked and get values of each fields
if(isset($_POST['submit'])){
    // echo "submit clicked";
    //check all fields filled
    $email = $_POST['email'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $zip = $_POST['zip'];
    // echo $email, $firstName,$lastName,$zip;

    //before insertin to database check for duplicate record
    $sql = "SELECT * FROM subscribe WHERE email ='". $email."'";
    // echo $sql;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "duplicate record exist";

    }else{
        //not duplicate you can insert to table
        $sql = "INSERT INTO subscribe (email,firstname, lastname, zip)
         VALUES ('".$email."','".$firstName."','".$lastName."','".$zip."')";
            if (mysqli_query($conn, $sql)) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }

    }   
}else{
    echo "sumbit not clicked";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>subscribe page</title>
</head>
<body>
    <h1>czc-sd subscribe page</h1>
    <form action="" method="POST">
        <label for="email">Email address</label><br>
        <input type="email" name="email"><br>
        <label for="firstname">first name</label><br>
        <input type="text" name="firstname"><br>
        <label for="lastname">last name</label><br>
        <input type="text" name="lastname"><br>
        <label for="zip">zip name</label><br>
        <input type="number" name="zip"><br>
        <input type="submit"  name="submit" value="Subscribe">

    </form>
</body>
</html>