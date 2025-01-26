<?php
// Start session
session_start();

// Database configuration
$host = "localhost";
$dbname = "aplikasi_prakerin";
$username = "root";
$password = "";

// Connect to database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate input
    if (empty($email) || empty($password)) {
        header("Location: index.php?error=Please fill in all fields");
        exit();
    }

    // Prepare SQL to fetch user
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if user exists
    if ($user) {
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            // Redirect based on role
            if ($user['role'] === 'admin') {
                header("Location: admin_dashboard.php");
            } elseif ($user['role'] === 'operator') {
                header("Location: operator_dashboard.php");
            } elseif ($user['role'] === 'guru') {
                header("Location: guru_dashboard.php");
            }
            exit();
        } else {
            // Incorrect password
            header("Location: index.php?error=Invalid email or password");
            exit();
        }
    } else {
        // User not found
        header("Location: index.php?error=Invalid email or password");
        exit();
    }
} else {
    // Redirect to login page if accessed directly
    header("Location: index.php");
    exit();
}
?>
