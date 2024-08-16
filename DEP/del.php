<?php
// Start the session
session_start();

// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password (leave empty if none)
$dbname = "blog"; // Your database name

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the post ID is provided
if (isset($_GET['id'])) {
    $postId = intval($_GET['id']);

    // Delete the blog post from the database
    $sql = "DELETE FROM blogposts WHERE id = $postId";

    // Attempt to execute the delete statement
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Blog post deleted successfully!'); window.location.href='new.php';</script>";
    } else {
        echo "Error deleting blog post: " . $conn->error;
    }
} else {
    echo "Invalid request!";
    exit;
}

// Close the connection
$conn->close();
?>
