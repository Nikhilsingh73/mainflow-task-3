<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD']== "POST"){
    $Email=$_POST['email'];
    $Password=$_POST['password'];

    if(!empty($Email) && !empty($Password) && !is_numeric($Email)){
        $query ="select * from form where email='$Email' limit 1";
        $result=mysqli_query($con , $query);

        if($result){
            if($result && mysqli_num_rows($result)>0){
                $user_data=mysqli_fetch_assoc($result);

                if($user_data['password']==$Password){
                    header("location:index.php");
                    die;
                }
            }
        } 

        echo "<script type='text/javascript'>alert('Worng username and password')</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('worng usernmae')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="./form.css">
</head>
<body>
    <div class="container">
        <form method="POST" class="login-form signup-form">
            <h1>LOGIN</h1>

            <label >Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password"  name="password" required>

            <button type="submit">login</button>
            <p>Not have an account? <a href="signup.php">Sign up here</a></p>
        </form>
    </div>
</body>
</html>