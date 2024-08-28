<?php
session_start();
 include("db.php");

 if($_SERVER['REQUEST_METHOD']=="POST"){
    $firstname=$_POST['Fname'];
    $lastname=$_POST['Lname'];
    $Gender=$_POST['Gender'];
    $Contact=$_POST['contact'];
    $Email=$_POST['email'];
    $Password=$_POST['password'];

    if(!empty($Email) && !empty($Password) && !is_numeric($Email)){
        $query="insert into form(Fname,Lname,Gender,contact,email,password) values ('$firstname',' $lastname','$Gender' , '$Contact','$Email','$Password')";
       
        mysqli_query($con,$query);
        echo "<script type='text/javascript'>alert('Successfully Register')</script>";
    }
    else{
            echo "<script type='text/javascript'>alert('Please enter valid information')</script>";
    }
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="container">
        <form method="POST" class="signup-form">
            <h1>Sign Up</h1>
            <label>First Name</label>
            <input type="text"  name="Fname" required>

            <label>Last Name</label>
            <input type="text" name="Lname" required>

            <label >Gender</label>
            <input type="text"  name="Gender" required>
            
            <label>Contact-no</label>
            <input type="text" name="contact" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label >Password</label>
            <input type="password"  name="password" required>

            <button type="submit">Sign Up</button>

            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
