<!DOCTYPE html>
<html lang="en">
<head>
    <!--font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700&display=swap" rel="stylesheet">	
    <link href="https://fonts.googleapis.com/css?family=Electrolize&display=swap" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Lobster|Permanent+Marker|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <!--Font-->
    <!--adapter la resolution sur tout les 	appareil-->
    <meta name="viewport" content="width=device-width , user-scalable=no , initial-scale=1">
    <!--adapter la resolution sur tout les 	appareil-->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
<div>
   <h1 style="font-family: 'Electrolize', sans-serif;text-align:center">You are now registered !</h1>
   <h3 style="font-family: 'Electrolize', sans-serif;text-align:center">Vous êtes maintenant inscrit!</h3> 
</div>
<a href="language.html"><button  style="margin-left:700px;margin-top:100px" >Continue to Play</button></a>
</head>
<body>
   
</body>
</html>
<?php
$username = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];
if (!empty($username) || !empty($password) || !empty($gender) || !empty($email) || !empty($phoneCode) || !empty($phone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "test667";
    $dbport = "3308";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname,$dbport);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $username, $password, $gender, $email, $phoneCode, $Phone);
      $stmt->execute();
         } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>