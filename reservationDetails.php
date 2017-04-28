<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user_role'])){
  //  header('Location:index.php');
}



include_once './_function.php';


?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<!-- 

Grill Template 

http://www.templatemo.com/free-website-templates/417-grill

-->
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
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->

             <header>
      <div id="main-header" >
          <div class="container">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="41%">&nbsp;</td>
    <td width="24%"><span class="logo"><a href="#"><img src="images/logo.png" title="Grill Template" alt="Grill Website Template" ></a></span></td>
    <td width="35%"><table width="50%" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td>   <a href="register.php" class="btn btn-default">Register Free</a>
                            &nbsp;<a href="login.php" class="btn btn-default">Login</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

            
            
                <div class="row">
                    <div id="menuDiv">
                    <center>
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
                            </center>
                    </div>
                    
                    
                 
                    
                    
                    
                    
                </div>
                
                
                
                
                
                
        </div>
        </div>
    </header>


            <div id="heading">
                <div class="container">
                   
                </div>
            </div>


            <div id="timeline-post">
              <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                           
                            
                            <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                            <td align="right"><strong>Table No</strong></td>
                            <td><strong>Current Status</strong></td>
                        </tr>







                        <?php
                                                    include_once './_function.php';

                        $conn = getDBConnection();

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM tbl ";

                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td align="right"><?php echo $row['tableno'] ?></td>
                                    <td>

                                  <button    <?php
                        if ($row['status'] == 'RESERVED') {
                            echo "class='btn btn-danger'";
                        } else if ($row['status'] == 'VACANT') {
                            echo "class='btn btn-success'";
                        }
                                ?>    style="cursor:default"><?php echo $row['status'] ?></button></td>
                                </tr>

                                <?php
                            }
                        } else {
                            
                        }

                        mysqli_close($conn);
                        ?>


                    </table>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                        	<h3>Our Restaurant</h3>
                            <p>Nulla sodales ut tellus blandit accumsan. Aliquam erat volutpat. Morbi quis vestibulum erat. Nam malesuada lobortis tempus. Fusce fermentum libero fringilla odio pharetra malesuada. Suspendisse potenti. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam ultrices lectus quis consequat fringilla. Mauris non ex et purus sollicitudin tempus vitae quis nisi.</p>
                        </div>
                        <div class="col-md-6">
                        	<h3>Team Management</h3>
                            <p>Suspendisse quis consectetur nisi, vitae consequat sem. In et quam id libero venenatis venenatis. Morbi vitae justo vulputate, auctor augue eu, pulvinar augue. Vestibulum placerat sem eu posuere laoreet. Ut ac ex nec urna maximus tristique interdum eget ipsum. Duis at pharetra neque, ut condimentum ex. Nunc tincidunt magna nec aliquam rhoncus. Morbi a posuere nunc.</p>
                        </div>
                    </div>
                    
                <div class="space50"></div>
                </div>
            </div>
            <footer>
                <div class="container">
                    <div class="top-footer">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="subscribe-form">
                                    <span>Get in touch with us</span>
                                    <form method="get" class="subscribeForm">
                                        <input id="subscribe" type="text" />
                                        <input type="submit" id="submitButton" />
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="social-bottom">
                                    <span>Follow us:</span>
                                    <ul>
                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-rss"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-footer">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="about">
                                    <h4 class="footer-title">About Grill</h4>
                                    <p>Grill is free HTML5 template by <span class="blue">template</span><span class="green">mo</span> and it is a free responsive bootstrap layout that can be applied for any purpose.
                                    <br><br>Credit goes to <a rel="nofollow" href="http://unsplash.com">Unsplash</a> for photos used in this template. Nam commodo erat quis ligula placerat viverra.</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="shop-list">
                                    <h4 class="footer-title">Shop Categories</h4>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>New Grill Menu</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Healthy Fresh Juices</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Spicy Delicious Meals</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Simple Italian Pizzas</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Pure Good Yogurts</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i>Ice-cream for kids</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="recent-posts">
                                    <h4 class="footer-title">Recent posts</h4>
                                    <div class="recent-post">
                                        <div class="recent-post-thumb">
                                            <img src="images/recent-post1.jpg" alt="">
                                        </div>
                                        <div class="recent-post-info">
                                            <h6><a href="#">Delicious and Healthy Menus</a></h6>
                                            <span>24/12/2084</span>
                                        </div>
                                    </div>
                                    <div class="recent-post">
                                        <div class="recent-post-thumb">
                                            <img src="images/recent-post2.jpg" alt="">
                                        </div>
                                        <div class="recent-post-info">
                                            <h6><a href="#">Simple and effective meals</a></h6>
                                            <span>18/12/2084</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="more-info">
                                    <h4 class="footer-title">More info</h4>
                                    <p>Sed dignissim, diam id molestie faucibus, purus nisl pretium quam, in pulvinar velit massa id elit.</p>
                                    <ul>
                                        <li><i class="fa fa-phone"></i>010-020-0340</li>
                                        <li><i class="fa fa-globe"></i>123 Dagon Studio, Yakin Street, Digital Estate</li>
                                        <li><i class="fa fa-envelope"></i><a href="#">info@company.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-footer">
                        <p>Copyright © 2084 <a href="#">Your Company Name</a></p>
                    </div>
                    
                </div>
            </footer>

        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script src="js/vendor/jquery.gmap3.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>