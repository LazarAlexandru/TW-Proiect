<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'car';

$con = mysqli_connect($host,$user,$password,$db);

if(mysqli_connect_error()){
    exit('Error connecting to the database' . mysqli_connect_error());
}

if($stmt = $con->prepare('SELECT id, password FROM user WHERE username = ?')){
    $stmt->bind_param('s',$_POST['username']);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows>0){
        echo 'Username already exists';
    }
    else{
        if($stmt = $con->prepare('INSERT INTO user(username,password,email,money) VALUES(?,?,?,50)')){
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $stmt->bind_param('sss',$_POST['username'],$password,$_POST['email']);
            $stmt->execute();
            echo 'Succesfully registered';
        }
        else{
            echo 'Error occured';
        }
    }
    $stmt->close();
}
else{
    echo 'Error occured';
}
$con->close();
?>