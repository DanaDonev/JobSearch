<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        <?php include '../styles.css'; ?>
    </style>
</head>
<body>
    <h1>Login</h1>
    <form action="../DB/login_process.php" method="post">
        <label>Username:</label>
        <input type="text" name="username" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>