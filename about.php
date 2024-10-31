<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Question Bank</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            color: #f0f0f0;
            background: url('122.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

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

        .container {
            padding: 4rem 0;
        }

        .card {
            background: rgba(26, 26, 26, 0.9); /* Slightly transparent background for blur effect */
            border: none;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }
        
        .h2 {
            color: black;
        }
        .card-body {
            color: #e0e0e0;
        }

        .card-title {
            color: #00c6ff;
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
                <li class="nav-item">
                    <a class="nav-link" href="home.php">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="download.php">
                        <i class="fas fa-download"></i> Download
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="about.php">
                        <i class="fas fa-info-circle"></i> About
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

    <!-- About Section -->
    <section class="container">
        <div class="card-body">
           <h2 class="text-center mb-4 text-light">About Question Bank</h2>
        </div>
       
        
        <!-- New Card -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to Our Platform</h5>
                        <p class="card-text">Our platform is designed to help students prepare efficiently by providing a vast collection of exam questions. Explore our resources to enhance your learning journey and achieve your academic goals.</p>
                        <a href="download.php" class="btn btn-light">Explore Resources</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Our Mission</h5>
                        <p class="card-text">Our mission is to provide high-quality questions and resources for students to excel in their exams and enhance their learning experience. We strive to make studying easier and more effective with our extensive question bank.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">How It Works</h5>
                        <p class="card-text">Our platform offers a comprehensive collection of questions organized by subject, year, and level. Users can search, filter, and download materials to aid their preparation. Simply select the year, level, and course to access relevant questions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Our Team</h5>
                        <p class="card-text">We are a dedicated team of educators and technologists committed to enhancing educational resources. Our team works tirelessly to curate and update our question bank to ensure accuracy and relevance.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Contact Us</h5>
                        <p class="card-text">If you have any questions or feedback, feel free to reach out to us. We value your input and are here to assist with any issues or inquiries you may have.</p>
                        <ul>
                            <li>Email: <a href="mailto:support@questionbank.com" class="text-light">support@questionbank.com</a></li>
                            <li>Phone: <a href="tel:+123456789" class="text-light">+123 456 789</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">FAQs</h5>
                        <p class="card-text">Have questions about how to use the platform? Check out our Frequently Asked Questions section for answers to common queries and troubleshooting tips.</p>
                        <a href="#" class="btn btn-light">View FAQs</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Feedback</h5>
                        <p class="card-text">We value your feedback to improve our services. Let us know your thoughts, suggestions, or any issues you may have experienced with our platform.</p>
                        <a href="#" class="btn btn-light">Give Feedback</a>
                    </div>
                </div>
            </div>
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
    <script>
        function confirmLogout(event) {
            event.preventDefault();
            const userConfirmed = confirm("Are you sure you want to log out?");
            if (userConfirmed) {
                window.location.href = 'index.php'; // Redirect to index page if "Yes"
            }
        }
    </script>
</body>
</html>
