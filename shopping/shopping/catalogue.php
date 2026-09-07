
<?php include_once "temp/header.php"; ?>
    <style>
        .pdf-container {
            display: flex;
            flex-wrap: wrap; /* Allow items to wrap to the next line */
            justify-content: center; /* Center items horizontally */
            margin: 20px 0; /* Add some vertical spacing */
        }

        .widget-brochure-box {
            background-color: #f8f9fa; /* Light background for contrast */
            border: 1px solid #ddd; /* Border around each item */
            border-radius: 5px; /* Rounded corners */
            padding: 15px; /* Padding inside the box */
            margin: 10px; /* Spacing between items */
            text-align: center; /* Center the text */
            width: 200px; /* Fixed width for consistency */
            transition: transform 0.2s; /* Smooth hover effect */
        }

        .widget-brochure-box:hover {
            transform: scale(1.05); /* Slightly enlarge on hover */
        }

        .brochure-icon {
            font-size: 40px; /* Larger icon size */
            color: #dc3545; /* Bootstrap danger color for the icon */
            margin-bottom: 10px; /* Space between icon and text */
        }

        .text-theme-colored4 {
            color: #007bff; /* Bootstrap primary color for text */
            font-weight: bold; /* Bold text */
            text-decoration: none; /* Remove underline */
        }

        .text-theme-colored4:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
    
    <?php include_once "temp/nav.php"; ?>

    <!-- product section -->
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Welcome</p>
                        <h1>Downloads</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- Start main-content -->
    <div class="main-content-area">

        <!-- Section: page title -->
        <section class="page-title layer-overlay overlay-light-9 section-typo-light bg-img-center" data-tm-bg-img="images/bg/bg3.jpg">
            <div class="container pt-50 pb-50">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 class="title">Downloads</h2>
                            <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                                <div class="breadcrumbs">
                                    <span><a href="index.php" rel="home">Home</a></span>
                                    <span><i class="fa fa-angle-right"></i></span>
                                    <span><a href="#">Downloads</a></span>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container mt-30 mb-30 pt-30 pb-30">
                <div class="row">
                    <div class="col-md-12 sm-pull-none">
                        <div class="blog-posts">
                            <article class="post clearfix mb-30 border-1px">
                                <div class="row">
                                    <div class="col">
                                        <div class="entry-content p-10">
                                            <h3 class="product-title mt-0 text-center">Download our catalogues</h3>
                                            <div class="pdf-container">
                                                <?php
                                                // Include database connection
                                                include_once "includes/db.php";

                                                // Fetch PDF files from the database
                                                $query = "SELECT file_name, file_path FROM downloads";
                                                $result = $con->query($query);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        $name = $row['file_name'];
                                                        $path = $row['file_path'];
                                                ?>
                                                <div class="widget widget-brochure-box">
                                                    <a class="brochure-box" href="<?php echo $path; ?>" download="<?php echo $name; ?>">
                                                        <i class="far fa-file-pdf brochure-icon"></i>
                                                        <span class="text-theme-colored4 font-size-14">Download <?php echo $name; ?></span>
                                                    </a>
                                                </div>
                                                <?php 
                                                    }
                                                } else {
                                                    echo "<p>No files available for download.</p>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end main-content -->

    <!-- end product section -->

    <?php include_once "temp/footer.php"; ?>

    <!-- jquery -->
    <script src="js/custom.js"></script>
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>

</body>
</html>