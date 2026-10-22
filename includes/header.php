<?php
// Set default page title if not set in the parent page
if (!isset($pageTitle)) {
    $pageTitle = "A.A. Fazal Muhammad | Portfolio";
}

// Helper to determine the current active script for navbar highlighting
$currentScript = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Personal Portfolio of A.A. Fazal Muhammad - Diploma in Information Technology Student at University of Sri Jayewardenepura">
    <meta name="keywords" content="A.A. Fazal Muhammad, Portfolio, DIT, ICT, University of Sri Jayewardenepura, Web Development, Networking, PHP, Bootstrap">
    <meta name="author" content="A.A. Fazal Muhammad">

    <title><?php echo htmlspecialchars($pageTitle); ?></title>

    <!-- Google Fonts: Inter & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome Icons 6.5.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm py-3" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
                <span class="brand-icon d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-code text-primary"></i>
                </span>
                <div>
                    <span class="brand-name fw-bold">Fazal Muhammad</span>
                    <small class="d-block text-secondary text-uppercase fw-semibold" style="font-size: 0.68rem; letter-spacing: 0.08em;">DIT Student &bull; USJ</small>
                </div>
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link px-3 <?php echo ($currentScript === 'index.php') ? 'active fw-semibold' : ''; ?>" href="index.php">
                            <i class="fa-solid fa-house me-1 d-lg-none"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 <?php echo ($currentScript === 'about.php') ? 'active fw-semibold' : ''; ?>" href="about.php">
                            <i class="fa-solid fa-user me-1 d-lg-none"></i> About Me
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 <?php echo ($currentScript === 'projects.php') ? 'active fw-semibold' : ''; ?>" href="projects.php">
                            <i class="fa-solid fa-laptop-code me-1 d-lg-none"></i> Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 <?php echo ($currentScript === 'contact.php') ? 'active fw-semibold' : ''; ?>" href="contact.php">
                            <i class="fa-solid fa-envelope me-1 d-lg-none"></i> Contact
                        </a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <a class="btn btn-outline-primary btn-sm px-3 rounded-pill d-inline-flex align-items-center gap-2" href="contact.php">
                            <span>Let's Connect</span>
                            <i class="fa-solid fa-arrow-right-long"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content Area Starts -->
    <main class="flex-grow-1">
