<?php
// Start the session
ob_start();
session_start();

// Check if username is set in the session
$username = '';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}

// If the username is not set, redirect to login page
if (empty($username)) {
    header("Location: /RibsCircle/login/login.php"); // Redirect to the correct login path
    exit(); // Ensure no further code is executed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        nav {
            background-color: #6a3c3c;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .logo img {
            height: 50px;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }
        ul li {
            position: relative;
            margin-right: 20px;
        }
        ul li a {
            text-decoration: none;
            color: #333;
            padding: 10px;
            transition: color 0.3s;
        }
        ul li a:hover {
            color: orange;
        }
        .menu-dropdown {
            cursor: pointer;
        }
        .dropdown {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            min-width: 150px;
            z-index: 1;
            border-radius: 5px;
            margin-top: 5px;
        }
        .menu-dropdown:hover .dropdown {
            display: block;
        }
        .dropdown a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .dropdown a:hover {
            background-color: #f0f0f0;
        }
        .sign-in {
            display: flex;
            align-items: center;
        }
        #cart-count {
            margin-left: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<nav>
    <div class="logo">
        <img src="Logo.png" alt="Logo">
    </div>
    <ul>
        <li><a href="/RibsCircle">Home</a></li>
        <li class="menu-dropdown">
            <a>Menu</a>
            <div class="dropdown">
                <a href="/RibsCircle/Menu/Dagwood_Menu/dagwood_menu.php">Dagwood Menu</a>
                <a href="/RibsCircle/Menu/Chicken_Menu/chickenmenu.php">Chicken Menu</a>
                <a href="/RibsCircle/Menu/Ribs_Menu/Ribs.php">Ribs Menu</a>
            </div>
        </li>
        <li><a href="gallery.php">Gallery</a></li>
    </ul>
    <ul style="display: flex; align-items: center; height: 100%;">
        <li>
            <a href="/RibsCircle/Cart/cart.php">
                <i class="fas fa-shopping-cart"></i>
                <span id="cart-count" style="color: orange;">0</span>
            </a>
        </li>

        <li class="sign-in">
            <li class="menu-dropdown">
                <a id="user-name"><?php echo htmlspecialchars($username); ?></a> <!-- Set username -->
                <div class="dropdown">
                    <a href="/RibsCircle/edit_profile.php">Edit Profile</a>
                    <a href="#" id="logout">Logout</a>
                </div>
            </li>
        </li>
    </ul>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const username = localStorage.getItem('username');
        const userNameElement = document.getElementById('user-name');

        // Check if username is available in local storage
        if (userNameElement && username) {
            userNameElement.textContent = username; // Set the username from localStorage
        } else {
            // Redirect to login page if the username is not found
            window.location.href = '/RibsCircle/login/login.php'; // Redirect to the correct login path
        }

        document.getElementById('logout').addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default link behavior
            localStorage.removeItem('username'); // Clear the username from local storage
            localStorage.removeItem('userId'); // Clear the userid from local storage
            window.location.href = '/RibsCircle/login/login.php'; // Redirect to the correct login path
        });
    });
</script>

</body>
</html>
