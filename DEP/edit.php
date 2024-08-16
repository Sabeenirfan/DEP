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

// Check if the ID is set
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID and convert it to an integer

    // Fetch the existing post data
    $sql = "SELECT * FROM blogposts WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $title = $row['title'];
        $content = $row['content'];
        $image = $row['image'];
    } else {
        echo "No post found.";
        exit;
    }
} else {
    echo "No ID specified.";
    exit;
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

    // Create the SQL query to update the blog post
    $sql = "UPDATE blogposts SET title = '$title', content = '$content', image = '$image' WHERE id = $id";

    // Attempt to execute the query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Blog post updated successfully!'); window.location.href='new.php';</script>";
    } else {
        echo "Error updating blog post: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!-- HTML Form for Updating Blog Post -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blog Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff3e0; /* Light peach background */
            color: #333;
        }

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
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #ff8f00; /* Warm orange */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #e07b00; /* Darker orange */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="inew.php">Home</a>
        <a href="createpost.php">Create Blog Post</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </div>

    <h2>Update Blog Post</h2>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo ($title); ?>" required>

        <label for="content">Content:</label>
        <textarea id="content" name="content" rows="6" required><?php echo ($content); ?></textarea>

        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" value="<?php echo ($image); ?>" required>

        <button type="submit">Update Post</button>
    </form>
</body>
</html>
