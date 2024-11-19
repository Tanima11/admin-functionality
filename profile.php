<?php
session_start();
include('connection.php'); // Include your DB connection

// Check if admin_id is set in session
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id']; // Get the admin_id from session
} else {
    echo "Admin ID not provided!";
    exit();
}

// Fetch the admin's profile details from the database
$query = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
$result = mysqli_query($conn, $query);

if ($result) {
    $admin = mysqli_fetch_assoc($result);
} else {
    echo "Admin not found!";
    exit();
}
?>

<!-- Display the admin's profile -->
<h1>Your Profile</h1>

<p><strong>Admin ID:</strong> <?php echo $admin['admin_id']; ?></p>
<p><strong>Name:</strong> <?php echo $admin['admin_name']; ?></p>
<p><strong>Email:</strong> <?php echo $admin['email']; ?></p>
<p><strong>Password:</strong> <?php echo $admin['password']; ?></p>
<p><strong>Phone:</strong> <?php echo $admin['phone']; ?></p>

<!-- Link to edit profile -->
<a href="edit.php">Edit Profile</a>
