<?php
session_start();
include("../DB/db.php");
$name = $_POST['name'];
$surname = $_POST['surname'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$password = $_POST['password'];
$employer = isset($_POST['employer']) ? 1 : 0;
$cv = 0;//file_get_contents($_FILES['cv']['tmp_name']);

$sql = "INSERT INTO user (Name, Surname, Username, Email, PhoneNo, Password, Employer, CV) VALUES ('$name', '$surname', '$username', '$email', '$phone_number', '$password', '$employer', '$cv')";

if ($conn->query($sql) === TRUE) {
    echo "New user created successfully";
    header("Location: ../Main/login.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
session_destroy();