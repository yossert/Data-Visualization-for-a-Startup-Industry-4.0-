    <!-- start including header-->
    <?php 
    include('./mainInclude/header.php');
    ?>
    <!-- end including header-->
    <!--start video background -->
    <div class="container-fluid remove-vid-marg">
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
                <source src="video/5.mp4">
            </video>
            <div class="vid-overlay"></div>
        </div>
        <div class="vid-content">
            <h1 class="my-content">Welcome to 4IOT</h1>
            <small class="fo">Navigating Intelligence Beyond Boundaries</small><br/>

            <?php 
                if(!isset($_SESSION['is_login'])){
                    echo'<a href="#" class="btn btn-danger mt-3" style="background-color: #97062a; border-color: #97062a " data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a> ';
                } else{
                    echo'<a href="./visitor/studentProfile.php" class="btn btn-primary mt-3" style="background-color: #97062a ; border-color: #97062a ">My Profile</a>';
                }
            
            ?>
            
        </div>
    </div>
    <!--end video background -->

    <!--start text banner -->

    <div class="container-fuid bg-dark txt-banner">
        <div class="row bottom-banner">
            <div class="col-sm text-center">
                <h5><i class="fas fa-globe mr-3"></i>52 Countries</h5>
            </div>
            <div class="col-sm text-center">
                <h5><i class="fas fa-user mr-3"></i>10 000+ Publishers</h5>
            </div>
            <div class="col-sm text-center">
                <h5><i class="fas fa-user mr-3"></i>50+ Partners</h5>
            </div>
        </div>
    </div>

    <!--end text banner -->


    <!--start why us -->


    <div class="container mt-5">
        <h1 class="text-center tit">Why us?</h1><br>
        <!--start card -->
        <div class="card-desk mt-4">
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0 px;">
                <div class="card">
                    <img src="image/card/car1.png" class ="card-img-top" alt="img" />
                    <div class="card-body">
                        <h5 class="card-title">Easy Setup</h5>
                        <p class="card-text">We've streamlined account management and security for you.</p>
                    </div>
                </div>
            </a>
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0 px;">
                <div class="card">
                    <img src="image/card/card3.png" class ="card-img-top" alt="img" />
                    <div class="card-body">
                        <h5 class="card-title">Unified Reporting</h5>
                        <p class="card-text">All your daily statistics and diverse topic analytics in one streamlined dashboard.</p>
                    </div>
                </div>
            </a>
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0 px;">
                <div class="card">
                    <img src="image/card/card2.png" class ="card-img-top" alt="img" />
                    <div class="card-body">
                        <h5 class="card-title">Contract Free</h5>
                        <p class="card-text">With 4IOT, you are free! No commitment or exclusivity.</p>
                    </div>
                </div>
            </a>
            <a href="#" class="btn" style="text-align: left; padding:0px; margin:0 px;">
                <div class="card">
                    <img src="image/card/card2.png" class ="card-img-top" alt="img" />
                    <div class="card-body">
                        <h5 class="card-title">Real-time insights</h5>
                        <p class="card-text">Instantaneous updates for your dynamic data across diverse topics.</p>
                    </div>
                </div>
            </a>
        </div>
        <!--end card -->
    </div>
    <!--end why us -->

    <!--start contact us -->
    <?php
    include('./contact.php');
    ?>
    <!--end contact us -->


    <!--start testimonial -->
    <h1 class="text-center testyheading p-4 tit">Feedback</h1>
    <div class="container-fluid mt-5" style="background-color: #f3d3d3" id="Feedback">
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider"class="owl-carousel">
                    <div class="testimonial">
                        <p class="description">
                            good Website
                        </p>
                        <div class="pic">
                            <img src="image/user/user1.png" alt="user" class="il">
                        </div>
                        <div class="testimonial-prof">
                            <h4>Sonam</h4>
                            <small>Web Developper</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end testimonial -->

    <!-- start social follow-->
    <div class="container-fluid bg-dark">
        <div class="row  text-white text-center p-1">
            <div class="col-sm">
                <a class="text-white social-hover" href="#">
                    <i class="fab fa-facebook-f"></i>  Facebook
                </a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#">
                    <i class="fab fa-twitter"></i>  Twitter
                </a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#">
                    <i class="fab fa-whatsapp"></i>  WhatsAPP
                </a>
            </div>
            <div class="col-sm">
                <a class="text-white social-hover" href="#">
                    <i class="fab fa-instagram"></i>  Instagram
                </a>
            </div>
        </div>
    </div>
    <!-- end social follow-->
    <!-- start about section-->
    <div class="container-fluid p-4" >
        <h1 class="text-center mb4 tit">About us</h1>
        <div class="container" >
            <div class="row">
                <div class="col-md-6">
                    <div class="card2">
                        <div class="card-body">
                            <p class="card-text">
                                "At 4IOT, we are more than just innovators; we are architects of the future. 
                                As a trailblazing force in the realm of technology, we embark on a relentless journey to redefine possibilities. 
                                Our commitment to excellence fuels a culture of continuous exploration and discovery. 
                                Rooted in a deep understanding of the evolving landscape, we leverage cutting-edge solutions in the Internet of Things (IoT).
                                With a passion for pushing boundaries, we seamlessly integrate artificial intelligence into every facet of our operations. 
                                At the heart of our company lies a dedication to crafting intelligent, scalable, and user-centric solutions. 
                                As we navigate the dynamic intersection of technology and imagination, we invite you to join us on this exciting voyage toward a connected,
                                intelligent, and transformative future."
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="image/about.png" class="img-fluid" alt="About Image">
                </div>
            </div>
        </div>   
    </div>
    <!-- end about section-->
    <!-- start including footer-->
    <?php 
        include('./mainInclude/footer.php');
        ?>
    <!-- end including footer-->