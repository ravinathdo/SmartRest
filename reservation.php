<!DOCTYPE html>
<?php
session_start();
?>
<html>
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
            <div id="top-header">
                <?php include './top_header.php'; ?>
            </div>
            <div id="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo">
                                <a href="#"><img src="images/logo.png" title="Grill Template" alt="Grill Website Template" ></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="main-menu">
                                <?php include './menu-customer.php'; ?>
                            </div>
                        </div>
                        <div class="col-md-3">

                        </div>
                    </div>
                </div>
            </div>
        </header>

     


        <div id="services">
            <div class="container">
                <div class="row">
                  
                </div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="service-item">
                            <div class="icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <h4>Table Reservation </h4>
                            <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                        </div>
                    </div>

                    <div class="col-md-8 col-sm-6">
                        <div class="col-md-5 col-sm-6">
                            <div class="row">
                                <form name="form1" method="post" action="reservation.php">
                                    <h4 class="titleStyle">New Reservation</h4>
                                    <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                        <tr>
                                          <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td align="right"><strong>Table Number</strong></td>
                                            <td>
                                                <select name="tbl" required="">
                                                    <option value="" >--select--</option>
                                                    <?php
                                                    include './_function.php';
                                                    $conn = getDBConnection();
                                                    if (!$conn) {
                                                        die("Connection failed: " . mysqli_connect_error());
                                                    }

                                                    $sql = "SELECT * FROM tbl";
                                                    $result = mysqli_query($conn, $sql);

                                                    if (mysqli_num_rows($result) > 0) {
                                                        // output data of each row
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <option value="<?php echo $row["tableno"] ?>"><?php echo $row["tableno"] ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                        echo "0 results";
                                                    }

//                                            mysqli_close($conn);
                                                    ?>
                                                </select></td>
                                        </tr>
                                        <tr>
                                          <td align="right"><strong>Date</strong></td>
                                          <td><input type="date" name="dt" required/></td>
                                        </tr>
                                      <tr>
                                          <td align="right"><strong>From</strong></td>
                                        <td><input type="time" name="from" required/></td>
                                        </tr>
                                        <tr>
                                          <td align="right"><strong>To</strong></td>
                                          <td><input type="time" name="to" required/></td>
                                        </tr>
                                        <tr>
                                          <td align="right">&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;</td>
                                            <td><input type="submit" value="Reserve" name="btnReserv" class="btn btn-warning"/>&nbsp;<input type="reset"  class="btn btn-default"/></td>
                                        </tr>
                                    </table>
                                </form>
                            </div></div>
                        <div class="col-md-5 col-sm-6">


                            <?php
                            if (isset($_POST['btnReserv'])) {
                                if (isReservatinAvailableForTimeSlot()) {
                                    echo '<div class="msgCenter">
<span class="btn btn-danger">Sorry already reserved !</span>
</div>';
                                    
                                } else {
                                    //echo 'Ready to reserv';
                                    /*
                                      ;
                                     */

                                    $sql = " INSERT INTO tbl_reservation
                                      (`tableno`,
                                      `from_time`,
                                      `to_time`,
                                      `status`,
                                      `usercreated`)
                                      VALUES ('".$_POST['tbl']."',
                                      '".$_POST['dt'].'T'.$_POST['from']."',
                                      '".$_POST['dt'].'T'.$_POST['to']."',
                                      'BUK',
                                      '".$_SESSION['user_id']."') ";


                                     //echo 'sql:' . $sql;
                                    
									if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
    echo '<div class="msgCenter">
<span class="btn btn-success"> Reservation created successfully </span>
</div> '  ;
		?>
										 <div class="well center-block" style="max-width:400px">
                             <button type="button" class="btn btn-primary btn-lg btn-block">Reservation No:<?php echo $last_id?></button>
                              <button type="button" class="btn btn-default btn-lg btn-block">Table No:<?php echo $_POST['tbl']?></button>
                              <button type="button" class="btn btn-default btn-xs">From:<?php echo $_POST['from']?></button>
                              <button type="button" class="btn btn-default btn-xs">To:<?php echo $_POST['to']?></button>
                               </div>
										<?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

                                    
                                }
                            }

                            function isReservatinAvailableForTimeSlot() {
                                $conn = getDBConnection();
                                $tableNo = $_POST['tbl'];
                                $from_date = $_POST['from'];
                                $to_date = $_POST['to'];

                                $sql = "  SELECT * FROM tbl_reservation WHERE ('$from_date' BETWEEN from_time AND to_time)
 OR ( '$to_date' BETWEEN from_time AND to_time) AND STATUS = 'RSV' AND tableno = '$tableNo' ";

                               
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
//                                    while ($row = mysqli_fetch_assoc($result)) {
//                                       
//                                    }
                                    return true;
                                } else {
                                    //echo "0 results";
                                    return false;
                                }
                                mysqli_close($conn);
                            }
                            ?>
                           

                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-6">

<?php
if (isset($_GET['rsvid'])) {
    $sql = "UPDATE tbl_reservation SET STATUS='CSL' WHERE id='" . $_GET['rsvid'] . "'";

    if (mysqli_query($conn, $sql)) {
         echo '<div class="msgCenter">
<span class="btn btn-success"> Reservation canceled successfully  </span>
</div> '  ;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>



                                <h3>My Reservations</h3>
                                <div class="table-responsive">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered table-hover">
                                    <tr>
                                        <td width="18%"><strong>Reservation No</strong></td>
                                        <td width="12%"><strong>Table No</strong></td>
                                        <td width="25%"><strong>From</strong></td>
                                        <td width="27%"><strong>To</strong></td>
                                        <td width="18%">&nbsp;</td>
                                    </tr>

<?php
//get my reservations 

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "
 SELECT T.*,status.description FROM tbl_reservation AS T INNER JOIN STATUS ON T.status = status.code
 WHERE T.usercreated = '" . $_SESSION['user_id'] . "' AND T.status = 'BUK' ORDER BY id DESC ";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

                                            <tr>
                                                <td><?php echo $row["id"] ?></td>
                                                <td><?php echo $row["tableno"] ?></td>
                                                <td><?php echo $row["from_time"] ?></td>
                                                <td><?php echo $row["to_time"] ?></td>
                                                <td><a href="reservation.php?rsvid=<?php echo $row["id"] ?>">cancel</a></td>
                                            </tr>
        <?php
    }
} else {
    echo "No reservation available";
}
?>


                                </table>
                                </div>


                            </div>

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