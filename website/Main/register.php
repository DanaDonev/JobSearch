<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        <?php include '../styles.css'; ?>
    </style>
</head>
<body>
    <h1>Register</h1>
    <form action="../DB/register_process.php" method="post" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Surname:</label>
        <input type="text" name="surname" required><br>
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Phone Number:</label>
        <input type="text" name="phone_number" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <label>Employer:</label>
        <input type="checkbox" name="employer" value="1"><br>
        <label>CV:</label>
        <input type="file" name="cv"><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>