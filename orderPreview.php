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
    <link rel="stylesheet" href="css/erest-style.css">
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
                <div class="col-md-12">
                    <h4>&nbsp;</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-cutlery"></i>
                        </div>
                        <h4>ORDER Detail</h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="col-md-11 col-sm-6">
                        <div class="row">

                            <h4 class="titleStyle"> Order Information </h4>



                            <?php
                            if (isset($_GET['orderID'])) {

                                $orderID = $_GET['orderID'];

                                $conn = getDBConnection();

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = " SELECT order_tbl.*,user.username FROM order_tbl INNER JOIN user
ON order_tbl.createduser = user.id  WHERE order_tbl.id = $orderID ";

                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row["id"];
                                        ?>

                                        <div class="well center-block" style="max-width:100%">

                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td width="7%"><h2><?php echo $row["id"]; ?></h2></td>
                                                    <td width="48%"><h4>Rs. <?php echo $row["totalamount"]; ?></h4></td>
                                                    <td width="45%">Order By: <?php echo $row["username"]; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td><?php echo $row["createddate"]; ?></td>
                                                    <td><?php
                            if ($row["status"] == 'PND') {
                                echo '<button type="button" class="btn btn-info">Pending</button>';
                            }
                            if ($row["status"] == 'ACT') {
                                echo '<button type="button" class="btn btn-success">Active</button>';
                            }
                            if ($row["status"] == 'CLS') {
                                echo '<button type="button" class="btn btn-primary">Closed</button>';
                            }
                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-bordered">
                                                            <tr>
                                                                <td width="32%"><strong>Item</strong></td>
                                                                <td width="22%"><strong>Qty</strong></td>
                                                             
                                                                <td width="28%"><strong>Price</strong></td>
                                                            </tr>

                                                            <?php
                                                            $sql_2 = " SELECT item.itemname,orderitem.qty,item.price FROM orderitem 
INNER JOIN item ON orderitem.itemid = item.id
WHERE orderitem.orderid = $id ";

                                                            //echo $sql_2;
                                                            $result_2 = mysqli_query($conn, $sql_2);
                                                            while ($row2 = mysqli_fetch_assoc($result_2)) {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $row2["itemname"]; ?></td>
                                                                    <td><?php echo $row2["qty"]; ?><?php echo $row2["price"]; ?></td>

                                                                    <td><?php echo $row2["qty"] * $row2["price"] ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </table></td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <?php
														if ($_SESSION['user_role'] != 'ADM')
                                                        if ($_GET['status'] != 'NO') {
                                                            ?>
                                                            <form name="form1" method="post" action="orderStatusChange.php">
                                                                <input type="hidden" name="orderID" value="<?php echo $id; ?>"/>
                                                                <input type="hidden" name="status" value="<?php echo $_GET['status']; ?>"/><!-- ACTIVE -->
                                                                <input type="submit" value="<?php echo $_GET['btn']; ?>" name="btnStatus" class="btn btn-warning"/>
                                                            </form>
                <?php
            }
            ?>

                                                    </td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </table>
                                        </div>



            <?php
        }
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
}
?>






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