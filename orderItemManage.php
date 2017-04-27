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

    <div id="services">
        <div class="container">

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <div class="icon">
                            <i class="fa fa-cutlery">

                           
</i>
                        </div>
                        <h4 class="titleStyle">Manage items </h4>
                        <p>Sed egestas tincidunt mollis. Suspendisse rhoncus vitae enim et faucibus. Ut dignissim nec arcu nec hendrerit. Sed arcu  sagittis vel diam in, malesuada malesuada risus. Aenean a sem leoneski.</p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6">
                    <div class="col-md-11 col-sm-11">
                        <div class="row">
                            <h4 class="titleStyle">Pending Orders</h4>

                           
                           
                           
                           
                           
                           
                           


                                <?php
                                $conn = getDBConnection();

                                if (!$conn) {
                                    die("Connection failed: " . mysqli_connect_error());
                                }
								
								
								
								if(isset($_POST["btnUpdate"])){
									
									$upsql = "UPDATE item SET price = '".$_POST["price"]."' , statuscode = '".$_POST["statuscode"]."' WHERE id = '".$_POST["id"]."'";
									 mysqli_query($conn, $upsql);
									 echo '<b>Item Updated Successfully</p>';
									}
								
								
								
								
								
								
								

                                $sql = "SELECT *  FROM item";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
<div style="float:left">
<form action="orderItemManage.php" method="post" >
<input type="hidden" name="id" value="<?php echo $row["id"]?>" />
<table width="200" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="food_item/<?php echo $row["imagepath"]?>" width="150" height="150" /></td>
  </tr>
  <tr>
    <td><?php echo $row["itemname"]?></td>
  </tr>
  <tr>
    <td><input type="number" name="price"  value="<?php echo $row["price"]?>"/></td>
  </tr>
  <tr>
    <td><select name="statuscode">
    <option value="ACT"  <?php if($row["statuscode"]=='ACT'){
		?>
        selected
        <?php
		} ?>> Active </option>
        <option value="DACT" <?php if($row["statuscode"]=='DACT'){
		?>
        selected
        <?php
		} ?>> Deactive </option>
    </select></td>
  </tr>
   <tr>
    <td><input type="submit" value="Update" name="btnUpdate"/></td>
  </tr>
</table>
</form>

</div>


                                      
                                        <?php
                                    }
                                } else {
                                    echo "0 results";
                                }

                                mysqli_close($conn);
                                ?>   

                      


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


    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>


</body>
</html>