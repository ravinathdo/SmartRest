<!DOCTYPE html>
<?php
session_start();
include_once './_function.php';
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
                    <div class="col-md-6">
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
                <div class="col-md-12">
                    <h4>&nbsp;</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon"> <i class="fa fa-cutlery"></i> </div>
                        <h4>Food Ordering</h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski. </p>
                        <p><form action="foodOrder.php">
                            <input type="submit" value="Make an Order Now" class="btn btn-warning"/>
                        </form>
                        </p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="col-md-11 col-sm-6">
                        <div class="row">
                            <h4 class="titleStyle">My Order History</h4>
                            <?php
                            if (isset($_GET['action'])) {
                                $conn = getDBConnection();

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = "UPDATE order_tbl SET STATUS = 'DEL' WHERE id = '" . $_GET['orderID'] . "'";

                                if (mysqli_query($conn, $sql)) {
//                                    echo "Record updated successfully";
                                    ?>
                                    <div class="msgCenter">
                                        <span class="btn btn-success">Order Cancled Successfully</span>
                                    </div>
                                    <?php
                                } else {
                                    echo "Error updating record: " . mysqli_error($conn);
                                }

                                mysqli_close($conn);
                            }
                            ?>
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                <tr>
                                    <td width="26%"><strong>Order No</strong></td>
                                    <td width="22%"><strong>Amount</strong></td>
                                    <td width="29%"><strong>Date Time</strong></td>
                                    <td width="14%"><strong>Status</strong></td>
                                    <td width="9%">&nbsp;</td>
                                </tr>

                                <?php
                                $conn = getDBConnection();


                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "SELECT * FROM order_tbl WHERE createduser = '" . $_SESSION['user_id'] . "' AND STATUS != 'DEL' ORDER BY id DESC";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                        <tr>
                                            <td>
                                                <a href="orderPreview.php?status=NO&orderID=<?php echo $row["id"]; ?>"><b> <?php echo $row["id"]; ?></b> </a> </td>
                                            <td><?php echo $row["totalamount"]; ?></td>
                                            <td><?php echo $row["createddate"]; ?></td>
                                            <td><?php
                                            
                                            if($row["status"]=='PND'){
                                                echo '<button type="button" class="btn btn-info">Pending</button>';
                                            }
                                            if($row["status"]=='ACT'){
                                                echo '<button type="button" class="btn btn-success">Active</button>';
                                            }
                                            if($row["status"]=='CLS'){
                                                echo '<button type="button" class="btn btn-primary">Closed</button>';
                                            }
                                            ?></td>
                                            <td><?php if ($row["status"] == 'PND') { ?>
                                                    <a href="custOrderHistory.php?orderID=<?php echo $row["id"]; ?>&status=DEL&action=DELETE" class="btn btn-warning">Cancel</a>
                                                    <?php
                                                }
                                                ?></td>
                                        </tr>


                                        <?php
                                        // echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
                                    }
                                } else {
                                    echo "0 results";
                                }

                                mysqli_close($conn)
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

</body>
</html>