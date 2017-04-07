<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['user_role'])){
//    header('Location:index.php');
echo '<script type="text/javascript">';
echo 'window.location.href="index.php";';
echo '</script>';
}
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
                               <?php
                            if ($_SESSION['user_role'] == 'CUS')
                                include './menu-customer.php';
                            if ($_SESSION['user_role'] == 'ADM')
                                include './menu-admin.php';
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
                        <div class="row">
                            <div class="col-md-12 col-sm-6">

                                <?php
                                include './_function.php';
                                $conn = getDBConnection();

                                if (isset($_GET['rsvid'])) {
                                    $sql = "UPDATE tbl_reservation SET STATUS='CLO' WHERE id='" . $_GET['rsvid'] . "'";

                                    if (mysqli_query($conn, $sql)) {
                                        echo "Reservation closed successfully";
                                    } else {
                                        echo "Error updating record: " . mysqli_error($conn);
                                    }
                                }
                                ?>

                                <h3>Open Reservations</h3>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                    <tr>
                                        <td width="18%"><strong> No</strong></td>
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
 WHERE  T.status = 'BUK' ORDER BY id DESC ";

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
                                                <td><a href="adminReservation.php?rsvid=<?php echo $row["id"] ?>">close</a></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "No reservation available";
                                    }
                                    ?>


                                </table>


                                <h3>Reservations History</h3>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                                    <tr>
                                        <td width="14%" height="23"><strong>No</strong></td>
                                        <td width="11%"><strong>Table No</strong></td>
                                        <td width="21%"><strong>From</strong></td>
                                        <td width="22%"><strong>To</strong></td>
                                        <td width="11%"><strong>Status</strong></td>
                                        <td width="21%">&nbsp;</td>
                                    </tr>

                                    <?php
//get my reservations 

                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    $sql = "

 SELECT T.id,T.tableno,T.from_time,T.to_time,status.description,user.firstname FROM tbl_reservation AS T
 INNER JOIN STATUS ON T.status = status.code
 INNER JOIN user ON T.usercreated = user.id WHERE t.status != 'BUK' ORDER BY T.id DESC  ";

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
                                                <td><a href="#"><?php echo $row["description"] ?></a></td>
                                                <td><?php echo $row["firstname"] ?></td>
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






       

        <footer>

        </footer>


        <script src="js/vendor/jquery-1.11.0.min.js"></script>
        <script src="js/vendor/jquery.gmap3.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>