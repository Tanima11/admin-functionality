<?php
session_start();
include('connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Update the query to match your admin fields
    $sql = "SELECT * FROM admin WHERE email='$email'"; // Assuming the 'admin' table is for admins
    $result = mysqli_query($conn, $sql);

    // Check if the query returned a valid result set
    if ($result) {
        $admin = mysqli_fetch_assoc($result);

        if ($admin && password_verify($password, $admin['password'])) {
            // Set session variables for the admin
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['admin_name'] = $admin['admin_name'];
            $_SESSION['email'] = $admin['email'];

            // Redirect to the dashboard
            header("Location: dashboard.php");
            exit(); // Make sure the script stops after redirecting
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "No admin found with this email.";
    }
}

mysqli_close($conn);
?>

<form action="login.php" method="POST">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    
    <button type="submit" name="login">Login</button>
</form>
