<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Question Bank</title>
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

        /* Reduce space between nav items */
.nav-item {
    margin-left: 10px; /* Reduce the margin */
}

/* Optional: Adjust the icon size if needed */
.nav-link i {
    margin-right: 5px; /* Add some spacing between the icon and text */
   /* font-size: 1rem;  Adjust icon size if necessary */
}

        
        .hero-section {
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 6rem 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
        }

        .btn-hero {
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            color: #fff;
            border: none;
        }

        .btn-hero:hover {
            background: linear-gradient(90deg, #0072ff, #00c6ff);
            color: #fff;
        }

        .features-section {
            padding: 4rem 0;
            background: #1a1a1a;
        }

        .feature {
            text-align: center;
            margin-bottom: 2rem;
        }

        .feature i {
            font-size: 2rem;
            color: #00c6ff;
            margin-bottom: 1rem;
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
            color: #00c6ff;
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

        /* Modal Styles */
        .modal-content {
            background-color: #333;
            color: #fff;
            border-radius: 10px;
            padding: 20px;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #00c6ff;
        }

        .modal-body {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .form-control {
            background-color: #555;
            color: #fff;
            border: 1px solid #00c6ff;
            border-radius: 5px;
        }

        .form-control:focus {
            border-color: #0072ff;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #00c6ff;
            border: none;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #0072ff;
        }

        #adminError {
            font-size: 1.1rem;
            font-weight: bold;
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
        <ul class="navbar-nav ml-auto"> <!-- Aligns items to the right -->
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-home"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="download.php">
                    <i class="fas fa-download"></i> Download
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">
                    <i class="fas fa-info-circle"></i> About
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#adminModal">
                    <i class="fas fa-user-shield"></i> Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="confirmLogout(event)">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Welcome to Question Bank</h1>
            <p>Your ultimate resource for exam preparation and practice questions.</p>
            <a href="download.php" class="btn btn-hero btn-lg">Get Resources</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 feature">
                    <i class="fas fa-book"></i>
                    <h4>Extensive Question Bank</h4>
                    <p>Access a wide range of questions from various subjects and difficulty levels.</p>
                </div>
                <div class="col-md-4 feature">
                    <i class="fas fa-user-graduate"></i>
                    <h4>For All Levels</h4>
                    <p>Find questions suitable for students at all academic levels.</p>
                </div>
                <div class="col-md-4 feature">
                    <i class="fas fa-tachometer-alt"></i>
                    <h4>Easy to Use</h4>
                    <p>Navigate and find the questions you need with our user-friendly interface.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Admin Password Modal -->
    <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminModalLabel">Admin Access</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="adminPasswordForm">
                        <div class="form-group">
                            <label for="adminPassword">Enter Admin Password</label>
                            <input type="password" class="form-control" id="adminPassword" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <p id="adminError" class="text-danger mt-3" style="display: none;">Incorrect Password!</p>
                </div>
            </div>
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
                    <a href="https://www.instagram.com" target="_blank" class="fab fa-instagram"></a>
                    <a href="https://www.facebook.com" target="_blank" class="fab fa-facebook"></a>
                    <a href="https://www.linkedin.com" target="_blank" class="fab fa-linkedin"></a>
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
    <script>
        // Logout confirmation
        function confirmLogout(event) {
            event.preventDefault();
            const userConfirmed = confirm("Are you sure you want to log out?");
            if (userConfirmed) {
                window.location.href = 'index.php'; // Redirect to index page if "Yes"
            }
        }

        // Admin password validation
        document.getElementById('adminPasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const passwordInput = document.getElementById('adminPassword').value;
            const correctPassword = '12345';
            const errorMessage = document.getElementById('adminError');

            if (passwordInput === correctPassword) {
                window.location.href = 'admin.php'; // Redirect to admin page if password is correct
            } else {
                errorMessage.style.display = 'block'; // Show error message if password is incorrect
            }
        });
    </script>
</body>
</html>
