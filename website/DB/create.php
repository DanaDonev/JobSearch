<?php
session_start();
// Check if the user is logged in and is an employer



// Create a new listing
if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $location = $_POST['location'];
  $employer_id = $_SESSION['employer_id'];

  $query = "INSERT INTO listings (title, description, category, location, employer_id) VALUES ('$title', '$description', '$category', '$location', '$employer_id')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "Listing created successfully!";
  } 
}


?>

<h1>Create a New Listing</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label for="title">Title:</label>
  <input type="text" id="title" name="title" required><br><br>
  <label for="description">Description:</label>
  <textarea id="description" name="description" required></textarea><br><br>
  <label for="category">Category:</label>
  <select id="category" name="category" required>
    <option value="">Select a category</option>
    <?php
    // Query to retrieve categories from the database
    $query = "SELECT * FROM categories";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
    }
    ?>
  </select><br><br>
  <label for="location">Location:</label>
  <input type="text" id="location" name="location" required><br><br>
  <input type="submit" name="submit" value="Create Listing">
</form>