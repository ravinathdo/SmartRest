<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user_role'])){
    header('Location:index.php');
}



include_once './_function.php';


?>
<head>
    <meta charset="utf-8">
    <title>Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/templatemo_style.css">
    <link rel="stylesheet" href="css/templatemo_misc.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/testimonails-slider.css">
<link href="css/erest-style.css" rel="stylesheet" type="text/css"/>
    <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
</head>
<body>

   
    
    
     <header>
      <div id="main-header" >
          <div class="container">
           <?php include './top_header.php'; ?>

            
            
                <div class="row">
                    <div id="menuDiv">
                    <center>
                   <?php
                            include './menu.php';
                            ?>
                      </center>
                    </div>
                  
                </div>

        </div>
      </div>
    </header>
    
    


    <?php
    if ($_SESSION['user_role'] == 'CUS') {
        ?>
        <div id="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li>
                        <div class="slider-caption">
                                 <h1 style="color:#FFF">Smart Restaruant</h1>
                        </div>
                        <img src="images/1.jpg" alt="" />
                    </li>
                    
                </ul>
            </div>
        </div>
        <?php
    }
    ?>



    <div id="services">
        <div class="container">

            <?php
            if ($_SESSION['user_role'] == 'CUS') {
                ?>
                <div class="row"></div>
                <?php
            }
            ?>
<br>
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
                        <h4>Smart waiters</h4>
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




    <?php
    if ($_SESSION['user_role'] == 'CUS') {
        ?>
        <div id="latest-blog">
            <div class="container">
                <div class="row"></div>
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
        <?php
    }
    ?>



    <div id="testimonails"></div>

    <footer>
   
    </footer>


    <script src="js/vendor/jquery-1.11.0.min.js"></script>
    <script src="js/vendor/jquery.gmap3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>
</html>