<?php
session_start();
$login_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'qbk'); // Replace with your database credentials

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query
    $sql = "SELECT * FROM signup WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Verify the provided password with the hashed password stored in the database
        if (password_verify($password, $user['password'])) {
            // Password is correct, set session and redirect
            $_SESSION['username'] = $username;
            header('Location: home.php'); // Redirect to home page
            exit;
        } else {
            // Invalid password
            $login_error = 'Invalid username or password.';
        }
    } else {
        // No user found with the provided username
        $login_error = 'Invalid username or password.';
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* Global styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #0D1A3A;
            color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        /* Navbar style */
        .navbar {
            background: linear-gradient(90deg, #1f1f1f, #2a2a2a);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand img {
            border-radius: 50%;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .btn-light {
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            color: #fff;
            border: none;
        }

        .btn-light:hover {
            background: linear-gradient(90deg, #0072ff, #00c6ff);
            color: #fff;
        }

        /* Footer styles */
        footer {
            background: linear-gradient(90deg, #1f1f1f, #2a2a2a);
            color: #e0e0e0;
            padding: 2rem 0;
            border-top: 2px solid #444;
        }

        footer a {
            color: #00c6ff;
        }

        footer a:hover {
            text-decoration: underline;
        }

        .form-control {
            background: #1a1a1a;
            border: 1px solid #444;
            color: #e0e0e0;
        }

        .form-control::placeholder {
            color: #888;
        }

        .form-control:focus {
            background: #1a1a1a;
            color: #e0e0e0;
            border-color: #00c6ff;
            box-shadow: none;
        }

        .report-form textarea {
            background: #1a1a1a;
            border: 1px solid #444;
            color: #e0e0e0;
            resize: vertical;
        }

        .report-form textarea::placeholder {
            color: #888;
        }

        .report-form textarea:focus {
            border-color: #00c6ff;
            box-shadow: none;
        }

        .social-icons a {
            color: #e0e0e0;
            font-size: 1.5rem;
            margin: 0 0.5rem;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #00c6ff;
        }

        /* Content area */
        .container-fluid {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('1122.jpg');
            /* Illustration image as background */
            background-size: cover;
            background-position: center;
            padding: 20px;
        }

        /* Login card */
        .card {
            background-color: rgba(255, 255, 255, 0.8);
            /* Semi-transparent card */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-family: 'Roboto', sans-serif;
            font-weight: bold;
        }

        h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-control {
            background-color: #e7f1ff;
            border: none;
        }

        .forgot-password {
            font-size: 0.875rem;
            float: right;
            color: #999;
        }

        .login-btn {
            background: linear-gradient(90deg, #0072ff, #00c6ff);
            color: #fff;
            width: 100%;
            margin-bottom: 20px;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        .social-login button {
            margin-right: 10px;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
        }

        .social-login button i {
            font-size: 1.5rem;
        }

        /* Modal styles */
        .modal-content {
            background-color: #1a1a1a; /* Dark background for modal */
            color: #e0e0e0; /* Light text color */
            border-radius: 8px;
        }

        .modal-header,
        .modal-body {
            padding: 20px;
        }

        .modal-title {
            font-weight: bold;
        }

        .btn-primary {
            background: linear-gradient(90deg, #0072ff, #00c6ff);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3, #0072ff);
        }

        .modal-body .form-group {
            margin-bottom: 15px;
        }

        .modal-body .social-login {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="2.png" alt="Logo" class="d-inline-block align-top" style="width: 40px; height: 40px;">
            Question Bank
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Align items to the right with ms-auto -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <button class="btn btn-light me-2">Get Started</button>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <button class="btn btn-light me-2">Login</button>
                    </a>
                </li> -->
            </ul>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container-fluid">
        <div class="card">
            <h1 class="text-center">Welcome Back!!!</h1>
            <p class="text-center">To Question Bank</p>
            <h2 class="text-center">Log In</h2>
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
                Open Login Form
            </button>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Question Bank</h5>
                    <p>Providing quality questions for exams and practice.</p>
                    <p>&copy; 1993 Question Bank. All rights reserved.</p>
                </div>
                <div class="col-md-4 social-icons">
                    <h5>Follow Us</h5>
                    <a href="https://www.instagram.com" target="_blank" class="bi bi-instagram"></a>
                    <a href="https://www.facebook.com" target="_blank" class="bi bi-facebook"></a>
                    <a href="https://www.linkedin.com" target="_blank" class="bi bi-linkedin"></a>
                </div>
                <div class="col-md-4 report-form">
                    <h5>Report Issues</h5>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control mb-3" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Describe the issue" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-light">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal for Login Form -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login to Question Bank</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group mt-3">
                            <input type="checkbox" id="rememberMe" name="rememberMe">
                            <label for="rememberMe">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 w-100">Login</button>
                        <p class="mt-3">or continue with</p>
                        <div class="social-login">
                            <button type="button" class="btn btn-outline-primary">
                                <i class="bi bi-google"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="bi bi-github"></i>
                            </button>
                            <button type="button" class="btn btn-outline-info">
                                <i class="bi bi-facebook"></i>
                            </button>
                        </div>
                        <p class="mt-3">Don't have an account? <a href="signup.php">Sign up here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
