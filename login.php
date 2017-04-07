<!DOCTYPE html>
<?php

session_start();
?>
<head>
    <meta charset="utf-8">
    <title>E-Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/templatemo_style.css">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/testimonails-slider.css">
    <link href="css/erest-style.css" rel="stylesheet" type="text/css"/>
    <link href="css/erest-style.css" rel="stylesheet" type="text/css"/>
    <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
</head>
<body>

    <header>
        <div id="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="home-account">
                            <a href="register.php">Register Free</a>
                            <a href="login.php">Login</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-info">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="#"><img src="images/logo.png" title="Grill Template" alt="Grill Website Template" ></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-menu">
                           <?php
                             if(isset($_SESSION['user_role'])){
								  if ($_SESSION['user_role'] == 'CUS')
                                include './menu-customer.php';
								 if ($_SESSION['user_role'] == 'ADM')
                                include './menu-admin.php';
								 }else{
									 	 include './menu-visitor.php';
									 }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="slider">


    </div>


    <div id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="titleStyle">Login</h4>
                    <form name="form1" method="post" action="">
                        <table width="50%" border="0" cellspacing="2" cellpadding="2">
                            <tr>
                                <td width="34%" align="right"><strong>Username</strong></td>
                                <td width="2%">&nbsp;</td>
                                <td width="64%"><input type="text" name="username" id="username" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td align="right"><strong>Password</strong></td>
                                <td>&nbsp;</td>
                                <td><input type="password" name="password" id="password" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="btnLog" value="Login" class="btn btn-warning"/>&nbsp;</td>
                            </tr>
                        </table>
                    </form>


                    <?php
					ob_start();
					
                    if (isset($_POST['btnLog'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        // Create connection
                        include './_function.php';
                        $conn = getDBConnection();
// Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM user WHERE username = '$username' AND PASSWORD = PASSWORD('$password') AND status = 'ACT' ";

                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                $_SESSION['user_id'] = $row["id"];
                                $_SESSION['user_username'] = $row["username"];
                                $_SESSION['user_role'] = $row["role"];
                                $_SESSION['user_firstname'] = $row["firstname"];
								
								//echo 'OKYYYYY';
								//ob_start();
                                header("Location:home.php");
//                                echo '<script type="text/javascript">';
//echo 'window.location.href="home.php";';
//echo '</script>';
								//ob_end_flush();
                            }
                        } else {
                            ob_end_flush();
							?>
                            <div class="msgCenter">
                                <span class="btn btn-danger">Invalid username or password</span>
                            </div>
                            <?php
                        }

                        mysqli_close($conn);
                    }
					
                    ?>  


                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-car"></i>
                        </div>
                        <h4>Smart Parking</h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-feed"></i>
                        </div>
                        <h4>Smart Table</h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-street-view"></i>
                        </div>
                        <h4>Smart to waiters</h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-bell"></i>
                        </div>
                        <h4>Ready to Serve</h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div id="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-section">
                        <h2>What are Latest</h2>
                        <img src="images/under-heading.png" alt="" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="images/blogpost1.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="content-show">
                                <h4><a href="single-post.html">Summer Sandwich</a></h4>
                                <span>29 Sep 2084</span>
                            </div>
                            <div class="content-hide">
                                <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="images/blogpost2.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="content-show">
                                <h4><a href="single-post.html">New Great Taste</a></h4>
                                <span>23 Sep 2084</span>
                            </div>
                            <div class="content-hide">
                                <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="images/blogpost3.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="content-show">
                                <h4><a href="single-post.html">Spicy Pizza</a></h4>
                                <span>14 Sep 2084</span>
                            </div>
                            <div class="content-hide">
                                <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="images/blogpost4.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="content-show">
                                <h4><a href="single-post.html">Healthy Food</a></h4>
                                <span>25 Aug 2084</span>
                            </div>
                            <div class="content-hide">
                                <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="images/blogpost5.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="content-show">
                                <h4><a href="single-post.html">Great Breakfast</a></h4>
                                <span>17 Aug 2084</span>
                            </div>
                            <div class="content-hide">
                                <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="images/blogpost6.jpg" alt="" />
                        </div>
                        <div class="blog-content">
                            <div class="content-show">
                                <h4><a href="single-post.html">Fresh Fruit Juice</a></h4>
                                <span>12 Aug 2084</span>
                            </div>
                            <div class="content-hide">
                                <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="testimonails">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-section">
                        <h2>What Customers Say</h2>
                        <img src="images/under-heading.png" alt="" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="testimonails-slider">
                        <ul class="slides">
                            <li>
                                <div class="testimonails-content">
                                    <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.</p>
                                    <h6>Jennifer - <a href="#">Chief Designer</a></h6>
                                </div>
                            </li>
                            <li>
                                <div class="testimonails-content">
                                    <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.</p>
                                    <h6>Laureen - <a href="#">Marketing Executive</a></h6>
                                </div> 
                            </li>
                            <li>
                                <div class="testimonails-content">
                                    <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit sed arcu odio, sagittis vel diam in, malesuada malesuada risus. Aenean a sem leo. Nam ultricies dolor et mi tempor, non pulvinar felis sollicitudin.</p>
                                    <h6>Tanya - <a href="#">Creative Director</a></h6>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>

    </footer>


    <script src="js/vendor/jquery-1.11.0.min.js"></script>
    <script src="js/vendor/jquery.gmap3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
