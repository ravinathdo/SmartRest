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
                <div class="col-md-12">
                    <h4>&nbsp;</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <h4>Food Order </h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="col-md-12 col-sm-6">
                        <div class="row">

                            <?php
                            // when pressing the order button put the data into tables 
                            include './_function.php';


                            $itemArray = $_SESSION['cart_items'];
//                            print_r($itemArray);




                            $orderNo = setNewOder();
                            if ($orderNo > 0) {
                                //ready to show order list with order number and status
                               // echo 'Show order item Details';
                                $_SESSION['print_cart_items'] = $_SESSION['cart_items'];
                                $_SESSION['print_total_price'] = $_SESSION['total_price'];
                                ?>

                                <table width="100%" border="1" cellspacing="0" cellpadding="0" class="table table-condensed">
                                    <tr>
                                      <td colspan="5">Status: Pending</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td><strong>Qty</strong></td>
                                        <td><strong>Price</strong></td>
                                        <td><strong>Total</strong></td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <?php
                                    $itemArray = $_SESSION['print_cart_items'];
                                    $itemArraylength = count($itemArray);

                                    for ($x = 0; $x < $itemArraylength; $x++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $itemArray[$x]["name"]; ?></td>
                                            <td><?php echo $itemArray[$x]["qty"]; ?></td>
                                            <td><?php echo $itemArray[$x]["price"]; ?></td>
                                            <td><?php echo $itemArray[$x]["price"] * $itemArray[$x]["qty"]; ?></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>Subtotal</td>
                                        <td><?php
                                            echo $_SESSION['print_total_price'];
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td></td>
                                        <td>&nbsp;</td>
                                    </tr>

                                </table>

                                <?php
                                unset($_SESSION['cart_items']);
                                unset($_SESSION['total_price']);
                            }
                            ?>


                            <?php

                            function setNewOder() {
                                $orderNo = 0;
                                $conn = getDBConnection();

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = " INSERT INTO `order_tbl`
            (`totalamount`,
             `status`,
             `createduser`)
VALUES ('" . $_SESSION['total_price'] . "',
        'PND',
        '" . $_SESSION['user_id'] . "') ";

                                if (mysqli_query($conn, $sql)) {
                                    $orderNo = mysqli_insert_id($conn);
									
									?>
									
                                    <div class="well center-block" style="max-width:400px"> 
                                    <button type="button" class="btn btn-primary btn-lg btn-block">Order placed successfully </button> <button type="button" class="btn btn-default btn-lg btn-block">Order No:<?php echo $orderNo?> </button>
                                     </div>
									<?php
                                   // echo '<p class="bg-success">Order placed successful Order No: ' . $orderNo . '</p>';
                                    setOrderItems($conn, $orderNo);
                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                }

                                mysqli_close($conn);
                                return $orderNo;
                            }

                            function setOrderItems($conn, $orderNo) {
//                                echo 'setSalesItems';
                                $itemArray = $_SESSION['cart_items'];
                                $itemArraylength = count($itemArray);

//                                echo '<br>';
//                                print_r($itemArray);

                                for ($x = 0; $x < $itemArraylength; $x++) {
                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    $sql = " INSERT INTO `orderitem`
            (`orderid`,
             `itemid`,
             `qty`)
VALUES ('$orderNo',
        '" . $itemArray[$x]["itemid"] . "','" . $itemArray[$x]["qty"] . "') ";


                                    if (mysqli_query($conn, $sql)) {
//                                        echo "New record created successfully";
//                                        updateItemStock($conn, $itemArray[$x]["itemID"], $itemArray[$x]["qty"]);
                                    } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
                                }//for loop
//                                mysqli_close($conn);
                            }

                            function getOrderItemForOrderByID($orderNo) {
                                $conn = getDBConnection();
                                // Create connection
                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }

                                $sql = "SELECT orderitem.* FROM orderitem INNER JOIN order_tbl
ON orderitem.orderid =  order_tbl.id WHERE orderitem.id = '$orderNo' ";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
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