<?php
// Database credentials
$host = "localhost";
$dbUsername = "root"; // Change this according to your MySQL username
$dbPassword = ""; // Change this according to your MySQL password
$dbName = "qbk"; // Database name

// Create a connection
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate inputs
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $file = $_FILES['Upload_file'];

    // Basic validation
    if (empty($year) || empty($level) || empty($course) || empty($semester) || empty($file['name'])) {
        echo "Please fill out all fields.";
        exit;
    }

    // Handle file upload
    $uploadDir = 'uploads/'; // Create this directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $fileName = basename($file['name']);
    $targetFilePath = $uploadDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow only specific file formats
    $allowedTypes = array('pdf', 'doc', 'docx', 'txt');
    if (!in_array($fileType, $allowedTypes)) {
        echo "Sorry, only PDF, DOC, DOCX, and TXT files are allowed.";
        exit;
    }

    // Check for file upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "Error uploading file: " . $file['error'];
        exit;
    }

    // Move the uploaded file to the server
    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        // File uploaded successfully, now save the information in the database
        $stmt = $conn->prepare("INSERT INTO upload (year, level, course, semester, file_name, upload_time) 
            VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssss", $year, $level, $course, $semester, $fileName);

        if ($stmt->execute()) {
            echo "File uploaded successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('1122.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #e0e0e0;
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

        .form-control {
            background: #1a1a1a;
            border: 1px solid #444;
            color: #e0e0e0;
        }

        .form-control::placeholder {
            color: #888;
        }

        .form-control:focus {
            border-color: #00c6ff;
            box-shadow: none;
        }

        .card {
            background-color: #1a1a1a;
            border: 1px solid #444;
            color: #e0e0e0;
        }

        .card-header {
            background-color: #00c6ff;
            color: #fff;
            font-size: 1.5rem;
        }

        .card-body {
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent */
        }
    </style>
</head>
<body>
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
                    <a class="nav-link" href="#" onclick="confirmLogout(event)">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                Upload Exam Questions
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <!-- Year selection -->
                    <div class="form-group">
                        <label for="year">Select Year:</label>
                        <select id="year" name="year" class="form-control" required>
                            <option value="" disabled selected>Select Year</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>

                    <!-- Level selection -->
                    <div class="form-group">
                        <label for="level">Select Level:</label>
                        <select id="level" name="level" class="form-control" required>
                            <option value="" disabled selected>Select Level</option>
                            <option value="nd1">ND1</option>
                            <option value="nd2">ND2</option>
                            <option value="hnd1">HND1</option>
                            <option value="hnd2">HND2</option>
                        </select>
                    </div>

                    <!-- Course selection -->
                    <div class="form-group">
                        <label for="course">Select Course:</label>
                        <select id="course" name="course" class="form-control" required>
                            <option value="" disabled selected>Select Course</option>
                            <!-- Courses will be populated dynamically based on selected level -->
                        </select>
                    </div>

                    <!-- Semester selection -->
                    <div class="form-group">
                        <label for="semester">Select Semester:</label>
                        <select id="semester" name="semester" class="form-control" required>
                            <option value="" disabled selected>Select Semester</option>
                            <option value="1st-semester">1st Semester</option>
                            <option value="2nd-semester">2nd Semester</option>
                        </select>
                    </div>

                    <!-- File upload -->
                    <div class="form-group">
                        <label for="fileUpload">Upload File:</label>
                        <input type="file" id="fileUpload" name="Upload_file" class="form-control-file" required>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
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
