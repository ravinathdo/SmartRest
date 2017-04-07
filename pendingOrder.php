<!DOCTYPE html>
<?php
session_start();
include_once './_function.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="10">
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
                            <?php include './menu.php'; ?>
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
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-cutlery">

                            <?php
                            $cnt = 0;
                            $cop = getDBConnection();
                            if (!$cop) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql = "SELECT COUNT(*) AS cnt FROM order_tbl WHERE STATUS = 'PND'";
                            $result = mysqli_query($cop, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $cnt = $row["cnt"];
									echo $cnt;
									
                                    if ($cnt > 0) {
                                        ?>
                                        <audio autoplay>
                                            <source src="asset/alert.mp3" type="audio/mpeg">
                                        </audio>
                                        <?php
                                    }
                                }
                            } else {
                                $cnt = "0";
                            }
                            mysqli_close($cop);
                            ?>
</i>
                        </div>
                        <h4 class="titleStyle">Order Explorer </h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="col-md-11 col-sm-11">
                        <div class="row">
                            <h4 class="titleStyle">Pending Orders</h4>

                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                <tr>
                                    <td width="17%">Order ID</td>
                                    <td width="26%">Amount</td>

                                    <td width="25%">&nbsp;</td>
                                    <td width="18%">Order By</td>
                                    <td width="14%">Status</td>

                                </tr>


                                <?php
                                $conn = getDBConnection();

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = "SELECT order_tbl.*,user.username FROM order_tbl INNER JOIN user 
ON order_tbl.createduser = user.id WHERE order_tbl.STATUS = 'PND'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>



                                        <tr>
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["totalamount"]; ?></td>
                                            <td><?php echo $row["createddate"]; ?></td>
                                            <td><?php echo $row["username"]; ?></td>
                                            <td><a  class="btn btn-warning" href="orderPreview.php?orderID=<?php echo $row["id"]; ?>&status=ACT&btn=Pick Up"><?php echo $row["status"]; ?></a></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "0 results";
                                }

                                mysqli_close($conn);
                                ?>   

                            </table>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <footer>
        <?php include './footer.php'; ?>
    </footer>

    <script src="js/vendor/jquery-1.11.0.min.js"></script>
    <script src="js/vendor/jquery.gmap3.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>


</body>
</html>