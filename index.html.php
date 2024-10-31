<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question Bank</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            color: #f0f0f0;
            background: #121212;
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

        .hero {
            position: relative;
            color: #e0e0e0;
            text-align: center;
            padding: 6rem 0;
            border-bottom: 2px solid #444;
        }

        .hero img {
            width: 100%;
            height: auto;
            object-fit: cover;
            
        }

        .hero-content {
            position: absolute; /* Positioning the content absolutely */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); /* Centering the content */
            z-index: 2;
            padding: 2rem;
            background-color: rgba(26, 26, 26, 0.7); /* Semi-transparent background for readability */
            border-radius: 10px;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 700;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
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

        /* Styles for content card */
        .content-card {
            background-color: #1a1a1a;
            border: 1px solid #444;
            border-radius: 10px;
            color: #e0e0e0;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .content-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .content-card h2 {
            color: #00c6ff;
        }

        .content-card ul li {
            list-style-type: none;
            margin: 0.5rem 0;
        }

        .content {
            padding: 4rem 0;
            color: #e0e0e0;
        }

        .content h2 {
            font-family: 'Roboto', sans-serif;
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #00c6ff;
        }

        /* About Section Styles */
        .about {
            padding: 4rem 0;
            background-color: #1a1a1a;
            color: #e0e0e0;
        }

        .about h2 {
            font-size: 2.5rem;
            color: #00c6ff;
        }

        .about p {
            font-size: 1.2rem;
            line-height: 1.6;
        }

        /* Slider Section Styles */
        .slider {
            position: relative;
            max-width: 100%;
            margin: 4rem auto;
            padding: 0 20px;
        }

        .slider-title {
            font-size: 2.5rem;
            color: #00c6ff;
            text-align: center;
            margin-bottom: 2rem;
        }

        .slider-container {
            display: flex;
            overflow-x: scroll;
            scroll-behavior: smooth;
        }

        .slider-container::-webkit-scrollbar {
            display: none;
        }

        .slider-item {
            flex: 0 0 auto;
            width: 300px;
            height: 100%;
            margin-right: 20px;
            transition: transform 0.5s all ease-in-out;
        }

        .slider-item img {
            width: 100%;
            border-radius: 10px;
        }

        .slider-item:hover {
            transform: scale(1.1);
            z-index: 20;
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
                   <a class="nav-link" href="signup.php">
                       <button class="btn btn-light">Get Started</button>
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="login.php">
                       <button class="btn btn-light">Login</button>
                   </a>
               </li>
           </ul>
       </div>
   </nav>

   <!-- Hero Section -->
   <header class="hero">
       <div class="hero-image">
           <img src="0.jpg" alt="Hero Image">
       </div>
       <div class="hero-content container">
           <h1 class="display-4">Welcome to Question Bank</h1>
           <p class="lead">Your ultimate resource for practice questions and exams.</p>
           <a href="signup.php">
               <button class="btn btn-light btn-lg mt-3">Explore Questions</button>
           </a>
       </div>
   </header>

   <!-- Content Section -->
   <section class="content">
       <div class="container">
           <div class="row">
               <div class="col-md-6">
                   <div class="card content-card">
                       <div class="card-body">
                           <h2>Courses</h2>
                           <ul>
                               <li>
                                   <strong>Computer Appreciation</strong>
                                   <p>A fundamental course that introduces students to basic computer operations and applications.</p>
                               </li>
                               <div id="more-courses" style="display: none;">
                                   <li>
                                       <strong>Code with C++</strong>
                                       <p>Learn the basics and advanced features of C++ programming, widely used in game development and high-performance applications.</p>
                                   </li>
                                   <li>
                                       <strong>Code with Python</strong>
                                       <p>Master Python programming, ideal for data science, machine learning, and web development.</p>
                                   </li>
                                   <li>
                                       <strong>Code with Java</strong>
                                       <p>Explore the world of Java programming, essential for building Android applications and enterprise solutions.</p>
                                   </li>
                               </div>
                           </ul>
                           <button class="btn btn-light mt-3" id="view-more-btn">View More Courses</button>
                       </div>
                   </div>
               </div>
               <div class="col-md-6">
                   <div class="card content-card">
                       <div class="card-body">
                           <h2>Question Types</h2>
                           <ul>
                               <li>
                                   <strong>Multiple Choice</strong>
                                   <p>Choose the correct answer from a list of options in this popular question format.</p>
                               </li>
                               <div id="more-questions" style="display: none;">
                                   <li>
                                       <strong>True/False</strong>
                                       <p>Test your knowledge with statements that are either true or false.</p>
                                   </li>
                                   <li>
                                       <strong>Short Answer</strong>
                                       <p>Provide brief but accurate answers to open-ended questions.</p>
                                   </li>
                                   <li>
                                       <strong>Essay</strong>
                                       <p>Demonstrate your understanding with detailed written responses.</p>
                                   </li>
                                   <li>
                                       <strong>Matching</strong>
                                       <p>Pair terms or concepts with their correct definitions or related items.</p>
                                   </li>
                                   <li>
                                       <strong>Fill-in-the-Blank</strong>
                                       <p>Complete the missing information in these structured questions.</p>
                                   </li>
                               </div>
                           </ul>
                           <button class="btn btn-light mt-3" id="view-more-questions-btn">View More Questions</button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

   <!-- JavaScript to toggle the visibility of more courses and questions -->
   <script>
       document.getElementById('view-more-btn').addEventListener('click', function() {
           var moreCourses = document.getElementById('more-courses');
           if (moreCourses.style.display === 'none') {
               moreCourses.style.display = 'block';
               this.textContent = 'View Less Courses';
           } else {
               moreCourses.style.display = 'none';
               this.textContent = 'View More Courses';
           }
       });

       document.getElementById('view-more-questions-btn').addEventListener('click', function() {
           var moreQuestions = document.getElementById('more-questions');
           if (moreQuestions.style.display === 'none') {
               moreQuestions.style.display = 'block';
               this.textContent = 'View Less Questions';
           } else {
               moreQuestions.style.display = 'none';
               this.textContent = 'View More Questions';
           }
       });
   </script>

   <!-- About Section -->
   <section class="about">
       <div class="container">
           <h2>About Us</h2>
           <p>Welcome to Question Bank! We provide a comprehensive repository of practice questions and exams designed to help students succeed. Our platform offers a range of features and tools to assist you in preparing for your exams, including:</p>
           <ul>
               <li><strong>Course Selection:</strong> Choose from a wide range of courses tailored to your educational needs.</li>
               <li><strong>Practice Questions:</strong> Access a diverse collection of practice questions and quizzes to test your knowledge.</li>
               <li><strong>Exam Preparation:</strong> Prepare for upcoming exams with our expertly crafted questions and study materials.</li>
           </ul>
           <p>Our mission is to support students in their academic journey by providing high-quality, accessible educational resources. Whether you're looking to improve your understanding of specific topics or need help with exam preparation, Question Bank is here to assist you.</p>
       </div>
   </section>

   <!-- Image Slider Section -->
   <section class="slider">
       <div class="container">
           <h2 class="slider-title">Partner with 100+ Students Across the World</h2>
           <div class="slider-container" id="slider">
               <div class="slider-item">
                   <img src="1122.jpg" alt="Image 1">
               </div>
               <div class="slider-item">
                   <img src="111.jpg" alt="Image 2">
               </div>
               <div class="slider-item">
                   <img src="122.jpg" alt="Image 3">
               </div>
               <div class="slider-item">
                   <img src="12.jpg" alt="Image 4">
               </div>
               <div class="slider-item">
                   <img src="123.jpg" alt="Image 5">
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

   <!-- JavaScript for Image Slider -->
   <script>
       const slider = document.getElementById('slider');
       let isDown = false;
       let startX;
       let scrollLeft;

       slider.addEventListener('mousedown', (e) => {
           isDown = true;
           slider.classList.add('active');
           startX = e.pageX - slider.offsetLeft;
           scrollLeft = slider.scrollLeft;
       });

       slider.addEventListener('mouseleave', () => {
           isDown = false;
           slider.classList.remove('active');
       });

       slider.addEventListener('mouseup', () => {
           isDown = false;
           slider.classList.remove('active');
       });

       slider.addEventListener('mousemove', (e) => {
           if (!isDown) return;
           e.preventDefault();
           const x = e.pageX - slider.offsetLeft;
           const walk = (x - startX) * 2; // Scroll-fast
           slider.scrollLeft = scrollLeft - walk;
       });

       // Auto scroll
       setInterval(() => {
           slider.scrollLeft += 300;
           if (slider.scrollLeft >= slider.scrollWidth - slider.clientWidth) {
               slider.scrollLeft = 0;
           }
       }, 3000);
   </script>

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>