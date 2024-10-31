<?php
// Database connection settings
$host = "localhost";  // Change this if your database is on a different host
$dbUsername = "root";  // Change this according to your MySQL username
$dbPassword = "";      // Change this according to your MySQL password
$dbName = "qbk";      // Database name

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $middleName = $conn->real_escape_string($_POST['middleName']);
    $surname = $conn->real_escape_string($_POST['surname']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $level = $conn->real_escape_string($_POST['level']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

    // Prepare and execute statement to check if the username or email is already taken
    $stmt = $conn->prepare("SELECT * FROM signup WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username or email already exists. Please choose another.";
        $stmt->close();
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user data into the database
    $stmt = $conn->prepare("INSERT INTO signup (first_name, middle_name, surname, username, email, level, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $firstName, $middleName, $surname, $username, $email, $level, $hashedPassword);

    if ($stmt->execute()) {
       echo "Registration successful! You can now <a href='login.php'>login</a>.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Question Bank</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            color: #f0f0f0;
            background: #121212;
            margin: 0;
            padding: 0;
            background-image: url('122.jpg'); /* Replace with your background image */
            background-size: cover; /* Adjusted to cover the entire background */
            background-opacity: 80%;
        }

        .social-login button {
            margin-right: 10px;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border: 1px solid #444;
            background: #1a1a1a;
        }
        .social-login button i {
            font-size: 1.5rem;
            color: #0099cc;
        }

        .navbar {
            background: linear-gradient(90deg, #1f1f1f, #2a2a2a);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            border-radius: 50%;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .nav-item {
            margin-left: 15px;
        }

        .container {
            padding: 4rem 0;
        }

        .form-container {
            background: #1a1a1a;
            border-radius: 10px;
            padding: 2rem;
            max-width: 600px;
            margin: auto;
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

        .btn-light {
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            color: #fff;
            border: none;
        }

        .btn-light:hover {
            background: linear-gradient(90deg, #0072ff, #00c6ff);
            color: #fff;
        }

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

        .social-icons a {
            font-size: 1.5rem;
            color: #e0e0e0;
            margin-right: 10px;
        }

        .social-icons a:hover {
            color: #0099cc;
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Align items to the right with ms-auto -->
               <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <button class="btn btn-light ">Get Started</button>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        <button class="btn btn-light ">Login</button>
                    </a>
                </li> -->
               
            </ul>
        </div>
    </nav>

     <!-- Sign Up Section -->
    <section class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Sign Up</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <i class="fas fa-user"></i>
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="John" required>
                    </div>
                    <div class="form-group col-md-4">
                        <i class="fas fa-user"></i>
                        <label for="middleName">Middle Name</label>
                        <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Doe">
                    </div>
                    <div class="form-group col-md-4">
                        <i class="fas fa-user"></i>
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Smith" required>
                    </div>
                </div>
                <div class="form-group">
                    <i class="fas fa-user-tag"></i>
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="johndoe" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@gmail.com" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-graduation-cap"></i>
                    <label for="level">Level</label>
                    <input type="text" class="form-control" id="level" name="level" placeholder="e.g., ND1, HND1" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="********" required>
                </div>
                <button type="submit" class="btn btn-light btn-block">Sign Up</button>
                <p class="text-center">or continue with</p>
                <div class="social-login text-center">
                    <button type="button" class="btn btn-outline-light">
                        <i class="fab fa-google"></i>
                    </button>
                    <button type="button" class="btn btn-outline-light">
                        <i class="fab fa-github"></i>
                    </button>
                    <button type="button" class="btn btn-outline-light">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                </div>
                <p class="text-center">Already have an account? <a href="login.php">Login here</a></p>
            </form>
        </div>
    </section>

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
                    <a href="https://www.instagram.com" target="_blank" class="fab fa-instagram"></a>
                    <a href="https://www.facebook.com" target="_blank" class="fab fa-facebook-f"></a>
                    <a href="https://www.linkedin.com" target="_blank" class="fab fa-linkedin-in"></a>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
