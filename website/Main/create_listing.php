<?php 
session_start();
include("../DB/db.php");


echo $_SESSION["s_id"];
if ($_SESSION["s_id"] === null) {
    echo "Please Log In First!";
    header('Location: ../Main/login.php');
    exit;
}

if (!$conn) {
    echo "ERROR! Could not connect to the database";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Job Listing</title>
    <style>
        <?php include '../styles.css'; ?>
    </style>
</head>
<body>
    <h1>Create Job Listing</h1>
    <form action="../DB/create_listing_process.php" method="post" enctype="multipart/form-data">
        <label class="label">Title:</label>
        <input class="input" type="text" name="title" required><br>
        
        <label class="label">Company:</label>
        <input class="input" type="text" name="company" required><br>
        
        <label class="label">Description:</label>
        <textarea class="textarea" name="description" required></textarea><br>
        
        <label class="label">Requirements:</label>
        <textarea class="textarea" name="requirements" required></textarea><br>
        
        <label class="label">Responsibilities:</label>
        <textarea class="textarea" name="responsibilities" required></textarea><br>
        
        <label class="label">Salary Min:</label>
        <input class="input" type="number" name="salary_min" required><br>
        
        <label class="label">Salary Max:</label>
        <input class="input" type="number" name="salary_max" required><br>
        
        <label class="label">Location:</label>
        <select class="input" name="location" required>
            <option value="Online">Online</option>
            <option value="Ljubljana">Ljubljana</option>
            <option value="Maribor">Maribor</option>
            <option value="Celje">Celje</option>
            <option value="Kranj">Kranj</option>
            <option value="Velenje">Velenje</option>
            <option value="Koper">Koper</option>
            <option value="Novo Mesto">Novo Mesto</option>
            <option value="Ptuj">Ptuj</option>
            <option value="Trbovlje">Trbovlje</option>
            <option value="Kamnik">Kamnik</option>
        </select><br>
        
        <label class="label">Picture:</label>
        <input class="input" type="file" name="picture"><br>
        
        <input class="button" type="submit" value="Create Listing">
    </form>
</body>
</html>
