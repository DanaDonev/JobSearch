<?php
session_start();
include("../DB/db.php");

// Fetch job listings from the database
$sql = "SELECT l.Id, l.Title, l.Company, l.Description, l.Requirements, l.Responsibilities, l.SalaryMin, l.SalaryMax, l.Location, l.Picture, l.UserId FROM listing l ORDER BY l.Id DESC";
$result = $conn->query($sql);

// Output job listings
if ($result->num_rows > 0) {
?>
    <style>
       <?php include '../styles.css'; ?>
    </style>
    <ul class="topnav">
  <li> <div class="logo-container">
                <img src="../logo.png" alt="Logo">
                <div class="logo">Job Search</div>
            </div></li>  
  <li><a href="../Main/homepage.php">Home</a></li>
  <li><a href="../Main/create_listing.php">Create</a></li>
  <li><a href="git_here">About Us</a></li>
  <?php 
  if(isset($_SESSION["logged"]) && $_SESSION["logged"] == true){echo '<li class="right"><a href="../DB/logout.php">'.$_SESSION["s_username"].' | Logout</a></li>';} 
  else {
    echo '<li class="right"><a href="../Main/login.php">Log in</a>';
    echo '</li><li class="right"><a href="../Main/register.php">Register!</a></li>';}
 ?>

    </ul>
    
    <h1>Current Job Listings</h1>
    <button class="button" style=" float:right; border: 2px solid black; font-size:20px; background-color: 979797;" >Filter Listings</button>
    <?php 
    while ($row = $result->fetch_assoc()) { ?>
        <div class="job-listing">
            <h2 class="job-title"><?php echo $row["Title"]; ?></h2>
            <p class="job-company"><?php echo $row["Company"]; ?></p>
            <p class="job-location"><?php echo $row["Location"]; ?></p>
            <button class="button" onclick="toggleDetails(this)">Read More</button>
            <div class="job-details">
                <p><strong>Description:</strong> <?php echo $row["Description"]; ?></p>
                <p><strong>Requirements:</strong> <?php echo $row["Requirements"]; ?></p>
                <p><strong>Responsibilities:</strong> <?php echo $row["Responsibilities"]; ?></p>
                <p><strong>Salary:</strong> <?php echo "$" . number_format($row["SalaryMin"], 0) . " - $" . number_format($row["SalaryMax"], 0); ?></p>
            </div>
        </div>
    <?php } ?>
<?php } else { ?>
    <p>No job listings found.</p>
<?php }

// Close connection
?>

<script>
    function toggleDetails(button) {
        var details = button.nextElementSibling;
        if (details.style.display === "block") {
            details.style.display = "none";
        } else {
            details.style.display = "block";
        }
    }
</script>