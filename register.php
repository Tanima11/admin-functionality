<?php
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the values from the form
    $admin_id = $_POST['admin_id'];
    $admin_name = $_POST['admin_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $phone = $_POST['phone'];

    // SQL query to insert data into the 'admin' table
    $sql = "INSERT INTO admin (admin_id, admin_name, email, password, phone) 
            VALUES ('$admin_id', '$admin_name', '$email', '$password', '$phone')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php"); // Redirect to login page on success
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Show error message if query fails
    }
}

mysqli_close($conn); // Close the database connection
?>
