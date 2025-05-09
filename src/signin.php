<?php
include('config/database.php');

$email=$_POST['e_mail'];
$passw=$_POST['p_assw'];

//$hashed_password=password_hash($passw,PASSWORD_DEFAULT);
$hashed_password=$passw;
$sql = "
sele
u.id
count (u.id) as total
from
users u
where
email='$email' and 
password='$hashed_password' and

$sql="group by" ;

$res= pg_query($conn, $sql);
if ($res) {
    $row = pg_fetch_assoc($res);
    if ($row['total'] > 0) {
        echo "<script>alert ('user has been logged in . Go to home! ')</script>";
        header('refresh:0;url=http://localhost/petstore/src/home.html');
    } else {
        echo "<script>alert ('user not found . Go to signup! ')</script>";
        header('refresh:0;url=http://localhost/petstore/src/signup.html');
    }
} else {
    echo "query Error ";
}

";

