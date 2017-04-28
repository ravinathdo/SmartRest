<!DOCTYPE html>
<?php 
session_start();
/*if(!isset($_SESSION['user_role']))
    header('Location:index.php');
  */  
    
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

    <style type="text/css">
        .pk-free{
            background-image: url(images/pk-free.png);
            width: 100px;
            height: 100px;
            text-align: center;
            padding-top: 13px;
            float:inherit;
            margin: 10px;
        }
        .pk-use{
            background-image: url(images/pk-use.png);
            width: 100px;
            height: 100px;
            text-align: center;
            padding-top: 13px;
            float:inherit;
            margin: 10px;
        }
    </style>

</head>
<body>

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

    <div id="slider">


    </div>


    <div id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>&nbsp;</h4>



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

                <div class="col-md-8 col-sm-6">
                    <div class="row">
                        <img src="images/pk-free.png" width="20" height="20"> Free | <img src="images/pk-use.png" width="20" height="20"> In Use
                        <?php
                        echo "     | Last Updated on - " . date("Y-m-d h:i:sa");
                        ?>

                    </div>


                    <?php
                    include './_function.php';

                    $conn = getDBConnection();
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    $sql = "SELECT * FROM slot ";

                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['status'] == 'FREE') {
                                ?>

                                <div class="pk-free">
                                    <h1><?php echo $row['slotno'] ?></h1>
                                </div>

                                <?php
                            } else if ($row['status'] == 'USE') {
                                ?>


                                <div class="pk-use">
                                    <h1><?php echo $row['slotno'] ?></h1>
                                </div>
                                <?php
                            }
                            ?>

                            <?php
                        }
                    } else {
                        
                    }

                    mysqli_close($conn);
                    ?>


                    <!--                    <div class="pk-free">
                                            <h1>1</h1>
                                        </div> 
                                        <div class="pk-use">
                                            <h1>2</h1>
                                        </div>-->
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