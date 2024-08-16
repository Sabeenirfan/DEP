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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_POST['image'];

    // Validate input data
    if (!$title || !$content || !$image) {
        echo "All fields are required!";
        exit;
    }

    // Create the SQL query to insert the blog post
    $sql = "INSERT INTO blogposts (title, content, image) VALUES ('$title', '$content', '$image')";

    // Attempt to execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Blog post created successfully!'); window.location.href='new.php';</script>";
    } else {
        echo "Error creating blog post: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<!-- HTML Form for Creating Blog Post -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff3e0; /* Light peach background */
            color: #333;
        }

        /* Navbar */
        .navbar {
            background: #ff8f00; /* Warm orange */
            padding: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            text-align: center;
            padding: 14px 25px;
            text-decoration: none;
            font-size: 18px;
            margin: 0 10px;
            border-radius: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .navbar a:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }

        h2 {
            color: #ff8f00; /* Highlight color */
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 600px;
            margin: 40px auto; /* Center the form */
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #ff6f00; /* Darker orange */
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%; /* Full width button */
        }

        button:hover {
            background-color: #e65100; /* Even darker on hover */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="new.php">Home</a>
        <a href="createpost.php">Create Blog Post</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </div>

    <h2>Create a New Blog Post</h2>
    <form action="createpost.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="6" required></textarea>

        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" required>

        <button type="submit">Create Post</button>
    </form>
</body>
</html>
