<?php
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

// Fetch blog posts from the database
$sql = "SELECT * FROM blogposts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooking Blog</title>
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
            padding: 5px 15px;
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

        /* Hero Section */
        .hero {
            background-image: url('Cuisine-food-Blog.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            color: white;
            padding: 120px 20px;
            text-align: center;
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.5);
            position: relative;
        }

        .hero h1 {
            font-size: 60px;
            margin: 0;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
        }

        .hero p {
            font-size: 24px;
            margin: 20px 0;
        }

        /* Content */
        .content {
            padding: 20px;
            text-align: center;
        }

        .content h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #ff8f00; /* Highlight color */
        }

        /* Cards */
        .cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            padding: 20px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            width: calc(20% - 20px);
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 200px; /* Increased height for larger images */
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            transition: transform 0.3s ease;
        }

        .card:hover img {
            transform: scale(1.1);
        }

        .card-content {
            padding: 15px;
            text-align: left;
        }

        .card-content h3 {
            font-size: 22px;
            margin: 0 0 10px;
            color: #ff8f00; /* Highlight color */
        }

        .card-content p {
            font-size: 14px;
            color: #555;
            margin: 0 0 10px;
        }

        /* Icon Styles */
        .icon {
            color: #ff8f00; /* Highlight color */
            margin-right: 10px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .icon:hover {
            color: #e07c00; /* Darker shade on hover */
        }

        /* Footer */
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .cards {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 80%; /* Full width on mobile */
            }

            .hero h1 {
                font-size: 40px;
            }

            .hero p {
                font-size: 20px;
            }

            .content h2 {
                font-size: 28px;
            }
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

    <!-- Hero Section -->
    <div class="hero">
        <h1>Welcome to My Cooking Blog</h1>
        <p>Discover delicious recipes and cooking tips</p>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Featured Recipes</h2>
        <p>
            Explore a variety of recipes from around the world. Whether you're a beginner or an experienced chef, you'll find something to suit your taste!
        </p>
        <div class="cards">
            <!-- Featured Recipe Cards -->
            <div class="card">
                <img src="pasta.jpg" alt="Recipe 1">
                <div class="card-content">
                    <h3>Pasta</h3>
                    <p>Creamy and delicious pasta tossed in a rich Alfredo sauce, garnished with fresh herbs.</p>
                  
                </div>
            </div>

            <div class="card">
                <img src="pizza.jfif" alt="Recipe 2">
                <div class="card-content">
                    <h3>Pizza</h3>

                    <p>A classic Italian pizza topped with gooey mozzarella cheese, fresh tomatoes, and basil.</p>
                   
                </div>
            </div>

            <div class="card">
                <img src="brownie.jfif" alt="Recipe 3">
                <div class="card-content">
                    <h3>Brownie</h3>
                    <p>Rich and fudgy chocolate brownie with a gooey center, perfect for satisfying your sweet tooth.</p>
            
                </div>
            </div>

            <div class="card">
                <img src="burger.jpg" alt="Recipe 4">
                <div class="card-content">
                    <h3>Chicken Burger</h3>
                    <p>Crispy chicken fillet topped with lettuce, mayo, and pickles, served in a toasted bun.</p>
   
                </div>
            </div>

            <div class="card">
                <img src="shake.jfif" alt="Recipe 5">
                <div class="card-content">
                    <h3>Chocolate Shake</h3>
                    <p>A thick and creamy chocolate shake topped with whipped cream and chocolate shavings.</p>
                   
                </div>
            </div>
        </div>

        <!-- Blog Posts Section -->
        <h2>Recent Blog Posts</h2>
        <div class="cards">
            <?php
            // Display the fetched blog posts
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<img src="' .($row["image"]) . '" alt="' . ($row["title"]) . '">';
                    echo '<div class="card-content">';
                    echo '<h3>' . ($row["title"]) . '</h3>';
                    echo '<p>' . ($row["content"]) . '</p>';
                    echo '<i class="fas fa-edit icon" onclick="window.location.href=\'edit.php?id=' . $row["id"] . '\';" title="Update"></i>';
                    echo '<i class="fas fa-trash icon" onclick="if(confirm(\'Are you sure you want to delete this post?\')) window.location.href=\'del.php?id=' . $row["id"] . '\';" title="Delete"></i>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No blog posts available.</p>';
            }

            // Close the connection
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
         Contact us for more info.
    </div>
</body>
</html>
