<?php
include("../DB/db.php");

session_start();

echo $_SESSION["s_username"];
if (!isset($_SESSION["s_username"])) {
    header('Location: ../Main/login.php');
    exit;
}

$title = $_POST['title'];
$company = $_POST['company'];
$description = $_POST['description'];
$requirements = $_POST['requirements'];
$responsibilities = $_POST['responsibilities'];
$salary_min = $_POST['salary_min'];
$salary_max = $_POST['salary_max'];
$location = $_POST['location'];
$s_id = $_SESSION["s_id"];

if ($s_id === null) {
    echo "Error: User ID is not set in the session.";
    exit;
}

if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
    $picture = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
} else {
    $picture = '';
}

// Prepare the SQL statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO listing (Title, Company, Description, Requirements, Responsibilities, SalaryMin, SalaryMax, Location, Picture, UserId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssiissi", $title, $company, $description, $requirements, $responsibilities, $salary_min, $salary_max, $location, $picture, $s_id);

if ($stmt->execute()) {
    echo "New listing created successfully";
    header("Location: ../Main/homepage.php");
    exit;
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
session_destroy();
?>
