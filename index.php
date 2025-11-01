<?php
// Database configuration
$host = 'localhost';
$dbname = 'portfolio_db';
$username = 'your_db_username';
$password = 'your_db_password';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Sanitize input
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $project_details = htmlspecialchars(trim($_POST['project_details'] ?? ''));
    
    // Validate
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required';
    }
    
    if (empty($project_details)) {
        $errors[] = 'Message is required';
    }
    
    if (empty($errors)) {
        try {
            // Connect to database
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Prepare and execute insert
            $stmt = $pdo->prepare("INSERT INTO contacts (name, email, project_details) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $project_details]);
            
            // Redirect with success message
            header('Location: index.php?success=1');
            exit;
            
        } catch (PDOException $e) {
            // Log error (in production, log to file instead)
            error_log('Database error: ' . $e->getMessage());
            header('Location: index.php?error=1');
            exit;
        }
    } else {
        // Redirect with error
        header('Location: index.php?error=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Kelvin Lamptey - Computer Science Student and CTO specializing in fullstack development, technical leadership, and cross-platform applications">
    <meta name="author" content="Kelvin Lamptey">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
	<meta property="og:site_name" content="Kelvin Lamptey - Portfolio" /> <!-- website name -->
	<meta property="og:site" content="https://kelvinlamptey.infy.uk" /> <!-- website link -->
	<meta property="og:title" content="Kelvin Lamptey - Student & CTO | Fullstack Developer"/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="Computer Science student and Chief Technology Officer specializing in Node.js, Django, React, Flutter, and modern web technologies" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="https://pbs.twimg.com/profile_images/1954057016483184640/PHgHEK9V_400x400.jpg" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="https://kelvinlamptey.infy.uk" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Kelvin Lamptey - Student & CTO | Fullstack Developer</title>
    
    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <style>
        .notification {
            position: fixed;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            min-width: 280px;
            max-width: 90vw;
            padding: 16px 32px;
            border-radius: 8px;
            color: #fff;
            font-size: 1.1rem;
            box-shadow: 0 4px 16px rgba(0,0,0,0.12);
            opacity: 0;
            z-index: 9999;
            pointer-events: none;
            transition: opacity 0.5s, top 0.5s;
        }
        .notification-success {
            background: linear-gradient(90deg, #28a745 60%, #218838 100%);
        }
        .notification-error {
            background: linear-gradient(90deg, #dc3545 60%, #b21f2d 100%);
        }
        .notification-show {
            opacity: 1;
            pointer-events: auto;
            top: 60px;
        }
    </style>
    <!-- Favicon  -->
    <link rel="icon" href="https://pbs.twimg.com/profile_images/1954057016483184640/PHgHEK9V_400x400.jpg">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Notification -->
    <?php if (isset($_GET['success'])): ?>
    <div id="notification" class="notification notification-success notification-show">
        ✓ Message sent successfully! I'll get back to you soon.
    </div>
    <?php elseif (isset($_GET['error'])): ?>
    <div id="notification" class="notification notification-error notification-show">
        ✗ Something went wrong. Please try again or email me directly.
    </div>
    <?php endif; ?>
    <!-- end of notification -->
    
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            
            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.svg" alt="alternative"></a>   -->

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">M</a> -->

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#header">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#services">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a href="https://github.com/kelvin-lamptey" target="_blank" rel="noopener">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-github fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="https://linkedin.com/in/kelvin-lamptey" target="_blank" rel="noopener">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-linkedin fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="https://x.com/kelvinolamptey" target="_blank" rel="noopener">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-container">
                        <h1 class="h1-large">Student. Developer. CTO. Building the future, one line at a time.</h1>
                        <a class="btn-solid-lg page-scroll" href="#about">Learn More</a>
                        <a class="btn-outline-lg page-scroll" href="#contact"><i class="fas fa-envelope"></i>Get in Touch</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- About-->
    <div id="about" class="basic-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-container first">
                        <h2>Hi there, I'm Kelvin Lamptey,</h2>
                        <p>I'm a Computer Science student and Chief Technology Officer with a passion for building innovative solutions. I balance academic excellence with real-world technology leadership, specializing in fullstack development across web, mobile, and desktop platforms using Node.js, Django, Flask, Vue, React, Go, Flutter, and C++.</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container second">
                        <div class="time">2024 - Present</div>
                        <h6>Chief Technology Officer</h6>
                        <p>Leading technical strategy and development teams while architecting scalable solutions for growing startups.</p>
                        <div class="time">2023 - Present</div>
                        <h6>Computer Science Student</h6>
                        <p>Pursuing advanced studies in software engineering, algorithms, and system design while maintaining hands-on industry experience.</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container third">
                        <div class="time">2022 - 2024</div>
                        <h6>Senior Fullstack Developer</h6>
                        <p>Built enterprise-grade applications and led cross-platform development initiatives using modern tech stacks.</p>
                        <div class="time">2020 - 2022</div>
                        <h6>Web Developer</h6>
                        <p>Designed and developed web solutions while learning the fundamentals of software architecture and best practices.</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of about -->


    <!-- Services -->
    <div id="services" class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Skills & Expertise</h2>
                    <p class="p-heading">As a student and CTO, I combine academic knowledge with practical experience in fullstack development, technical leadership, and system architecture. My expertise spans multiple domains from modern web frameworks to mobile and desktop development.</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-box">
                        <i class="fas fa-laptop-code"></i>
                        <h4>FULLSTACK DEVELOPMENT</h4>
                        <p>Expert in building scalable web applications using Node.js, Django, Flask, Vue, and React. Proficient in both frontend and backend architecture with a focus on performance and maintainability.</p>
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-box">
                        <i class="fas fa-users-cog"></i>
                        <h4>TECHNICAL LEADERSHIP</h4>
                        <p>Leading development teams as CTO, making strategic technology decisions, and mentoring developers. Experience in agile methodologies, code reviews, and establishing best practices.</p>
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-box">
                        <i class="fas fa-mobile-alt"></i>
                        <h4>CROSS-PLATFORM APPS</h4>
                        <p>Building mobile applications with Flutter and desktop applications with C++. Experienced in creating consistent user experiences across web, mobile, and desktop platforms.</p>
                    </div> <!-- end of text-box -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of services -->


    <!-- Details -->
	<div class="split">
		<div class="area-1">
		</div><!-- end of area-1 on same line and no space between comments to eliminate margin white space --><div class="area-2 bg-gray">
            <div class="container">    
                <div class="row">
                    <div class="col-lg-12">     
                        
                        <!-- Text Container -->
                        <div class="text-container">
                            <h2>Why I Stand Out</h2>
                            <p>Balancing academic rigor with practical CTO experience gives me a unique perspective on both cutting-edge research and real-world implementation challenges.</p>
                            <h5>TECHNICAL STACK</h5>
                            <p>I work daily with HTML, CSS, JavaScript, TypeScript, Python, Go, and C++. My tech stack includes Node.js, Django, Flask, Vue, React, Flutter, and modern cloud infrastructure.</p>
                            <h5>LEADERSHIP & COLLABORATION</h5>
                            <p>As a CTO, I lead cross-functional teams, make architectural decisions, and ensure code quality through reviews and mentorship. I believe in clear communication and iterative development.</p>
                            
                            <div class="icons-container">        
                                <img src="images/details-icon-html.png" alt="alternative">
                                <img src="images/details-icon-css.png" alt="alternative">
                                <img src="images/details-icon-bootstrap.png" alt="alternative">
                                <img src="images/details-icon-javascript.png" alt="alternative">
                            </div> <!-- end of icons-container -->
                        </div> <!-- end of text-container -->
                        <!-- end of text container -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
		</div> <!-- end of area-2 -->
    </div> <!-- end of split -->
    <!-- end of details -->


    <!-- Projects -->
    <div id="projects" class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Featured Projects</h2>
                    <p class="p-heading">A selection of academic, personal, and professional projects showcasing my range from banking platforms to real-time communication systems. Each project represents a unique challenge in architecture, scalability, or user experience.</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div class="image-container">
                            <a href="project.html">
                                <img class="img-fluid" src="images/project-1.jpg" alt="alternative">
                            </a>
                        </div> <!-- end of image-container -->
                        <p><strong>MasterBank:</strong> Enterprise banking platform built with modern web technologies. Handled secure transactions, user authentication, and real-time account management. <a class="blue" href="https://masterbank.infy.uk">View Project</a></p>
                    </div> <!-- end of text-container -->
                    <div class="text-container">
                        <div class="image-container">
                            <a href="project.html">
                                <img class="img-fluid" src="images/project-2.jpg" alt="alternative">
                            </a>
                        </div> <!-- end of image-container -->
                        <p><strong>SaucyChat:</strong> Real-time messaging platform with WebSocket integration. Features include instant messaging, user presence, and responsive design across devices. <a class="blue" href="https://saucychat.infy.uk">View Project</a></p>
                    </div> <!-- end of text-container -->
    </div> <!-- end of basic-3 -->
    <!-- end of projects -->


    <!-- Section Divider -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <hr class="section-divider">
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
    <!-- end of section divider -->


    <!-- Questions -->
    <div class="accordion-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">Frequently Asked Questions</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How do you balance being a student and a CTO?
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    Time management and prioritization are key. My academic studies inform my technical decisions, while my CTO experience enriches my understanding of real-world applications. Both roles complement each other perfectly.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What technologies are you most proficient in?
                                </button>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    I specialize in fullstack development with Node.js, Django, Flask, Vue, React, and Go for backend services. I also build mobile apps with Flutter and desktop applications with C++. My focus is on choosing the right tool for each specific challenge.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Are you available for collaborations or consulting?
                                </button>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    Yes! I'm open to interesting projects, technical consulting, and collaboration opportunities. Whether it's architecture review, code mentorship, or building something new, feel free to reach out through the contact form.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFour">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What kind of projects interest you most?
                                </button>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                <div class="card-body">
                                    I'm drawn to challenging technical problems that require innovative solutions. This includes scalable architectures, real-time systems, cross-platform applications, and projects that push the boundaries of what's possible with modern web technologies.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingFive">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    How can I get in touch with you?
                                </button>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                <div class="card-body">
                                    The best way to reach me is through the contact form below or via email at kelvinlamptey@duck.com. I also stay active on LinkedIn and Twitter where I share insights about technology and development.
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of accordion -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of accordion-1 -->
    <!-- end of questions -->


    <!-- Contact -->
    <div id="contact" class="form-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Let's Connect</h2>
                    <p class="p-heading">Whether you're interested in collaboration, have a technical question, or want to discuss potential opportunities, I'd love to hear from you. Reach out via the form below or email me directly at <a class="blue no-line" href="mailto:kelvinlamptey@duck.com">kelvinlamptey@duck.com</a></p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- Contact Form -->
                    <form id="contactForm" method="post" action="index.php">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control-input" id="cname" required>
                            <label class="label-control" for="cname">Name</label>
                        </div>
                        <div class="form-group">
                            <input type="email" required class="form-control-input" id="cemail" name="email" required>
                            <label class="label-control" for="cemail">Email</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control-textarea" id="cmessage" name="project_details" required></textarea>
                            <label class="label-control" for="cmessage">Your message</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">Send Message</button>
                        </div>
                    </form>
                    <!-- end of contact form -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->  
    <!-- end of contact -->


    <!-- Footer -->
    <div class="footer bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="social-container">
                        <span class="fa-stack">
                            <a href="https://github.com/kelvin-lamptey">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-github fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://linkedin.com/kelvin-lamptey">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="https://x.com/kelvinl74577">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                    
                        <span class="fa-stack">
                            <a href="https://instagram.com/kelvinlamptey7">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                    
                    </div> <!-- end of social-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © <a class="no-line" href="https://kelvinlamptey.infy.uk">Kelvin Nii Odartey Lamptey</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->   
        
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
    <script>
    // Notification fade in/out
    document.addEventListener('DOMContentLoaded', function() {
        var notif = document.getElementById('notification');
        if (notif) {
            setTimeout(function() {
                notif.classList.add('notification-show');
            }, 100); // fade in
            setTimeout(function() {
                notif.classList.remove('notification-show');
                setTimeout(function() {
                    if (notif) notif.style.display = 'none';
                }, 500); // fade out
            }, 3500); // show for 3.5s
        }
    });
    </script>
</body>
</html>
