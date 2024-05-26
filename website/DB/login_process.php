<?php
session_start();
include("../DB/db.php");

$username = $_POST['username'];
$password = $_POST['password'];

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM user WHERE Username = ? AND Password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User found, start session and set session variables
    $user = $result->fetch_assoc();
    $_SESSION["s_id"] = $user["Id"];  // Ensure correct case for field name
    $_SESSION["s_username"] = $user["Username"];
    $_SESSION["email"] = $user["Email"];
    $_SESSION["logged"] = true;
    header("Location: ../Main/homepage.php");
    exit;
} else {
    echo "Invalid username or password";
}

$stmt->close();
$conn->close();
?>
