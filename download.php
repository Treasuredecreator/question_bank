<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qbk"; // Use the correct database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file download request
if (isset($_POST['download'])) {
    // Get the user input from the form submission
    $year = $_POST['year'];
    $level = $_POST['level'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];

    // Prepare and bind the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM upload WHERE year = ? AND level = ? AND course = ? AND semester = ?");
    $stmt->bind_param("ssss", $year, $level, $course, $semester);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any result is found
    if ($result->num_rows > 0) {
        // Fetch file details
        $row = $result->fetch_assoc();
        $fileName = htmlspecialchars($row["file_name"], ENT_QUOTES, 'UTF-8');
        $filePath = 'upload/' . $fileName;

        // Check if the file exists
        if (file_exists($filePath)) {
            // Set headers to force download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));
            flush(); // Flush system output buffer
            readfile($filePath);
            exit;
        } else {
            http_response_code(404);
            exit; // Stop further execution if the file doesn't exist
        }
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download - Question Bank</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            color: #f0f0f0;
            background: url('123.jpg') no-repeat center center fixed;
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
        .container {
            padding: 4rem 0;
        }
        .form-container {
            background: rgba(26, 26, 26, 0.9);
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
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item active">
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
                    <a class="nav-link" href="#" onclick="confirmLogout(event)">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Download Section -->
    <section class="container">
        <div class="form-container">
            <h2 class="text-center mb-4">Download Materials</h2>
            <form method="POST" action="download.php">
                <div class="form-group">
                    <label for="year">Select Year</label>
                    <select id="year" name="year" class="form-control" required>
                        <option value="">Select Year</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="level">Select Level</label>
                    <select id="level" name="level" class="form-control" required>
                        <option value="" disabled selected>Select Level</option>
                        <option value="nd1">ND1</option>
                        <option value="nd2">ND2</option>
                        <option value="hnd1">HND1</option>
                        <option value="hnd2">HND2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="course">Select Course</label>
                    <select id="course" name="course" class="form-control" required>
                        <option value="" disabled selected>Select Course</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="semester">Select Semester</label>
                    <select id="semester" name="semester" class="form-control" required>
                        <option value="" disabled selected>Select Semester</option>
                        <option value="1st-semester">1st Semester</option>
                        <option value="2nd-semester">2nd Semester</option>
                    </select>
                </div>
                <button type="submit" name="download" class="btn btn-light btn-block">Download</button>
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
                    <a href="https://www.facebook.com" target="_blank" class="fab fa-facebook"></a>
                    <a href="https://www.linkedin.com" target="_blank" class="fab fa-linkedin"></a>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" placeholder="Describe the issue" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-light btn-block">Submit</button>
                    </form>
                </div>
            </div>
        </div>
       </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Course options based on selected level
        const coursesByLevel = {
            'nd1': [
                { value: 'intro-computing', text: 'Intro. to Computing' },
                { value: 'intro-digital-electronics', text: 'Intro. to Digital Electronics' },
                { value: 'intro-programming', text: 'Intro. to Programming' },
                { value: 'statistics-computing-I', text: 'Statistics for Computing I' },
                { value: 'computer-app-packages-I', text: 'Computer Application Packages I' },
                { value: 'use-of-english', text: 'Use of English' },
                { value: 'citizenship-education-I', text: 'Citizenship Education I' },
                { value: 'logic-linear-algebra', text: 'Logic & Linear Algebra' }
            ],
            'nd2': [
                { value: 'programming-java', text: 'Programming using Java' }
            ],
            'hnd1': [
                { value: 'programming-cpp', text: 'Programming using C++' },
                { value: 'programming-python', text: 'Programming using Python' },
                { value: 'programming-java', text: 'Programming using Java' }
            ],
            'hnd2': [
                { value: 'programming-java', text: 'Programming using Java' }
            ]
        };

        document.getElementById('level').addEventListener('change', function() {
            const level = this.value;
            const courseSelect = document.getElementById('course');
            courseSelect.innerHTML = '<option value="" disabled selected>Select Course</option>'; // Reset course options

            if (coursesByLevel[level]) {
                coursesByLevel[level].forEach(course => {
                    const option = document.createElement('option');
                    option.value = course.value;
                    option.textContent = course.text;
                    courseSelect.appendChild(option);
                });
            }
        });

        // Logout confirmation
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm('Are you sure you want to log out?')) {
                window.location.href = 'logout.php'; // Redirect to the logout page
            }
        }
    </script>
</body>
</html>
