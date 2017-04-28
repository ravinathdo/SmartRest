<!DOCTYPE html>
<?php 
session_start();
if(!isset($_SESSION['user_role'])){
    header('Location:index.php');
}
    
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
                       
                       
                       
                       <?php
				    include './_function.php';
			
                    $conn = getDBConnection();
					   
					   
                       if(isset($_GET['action'])){
						   //http://192.168.8.113/light1off
						   //action=on&tableNo
						   $action = $_GET['action'];
						   $tableNo = $_GET['tableNo'];
						   
						   
        updateTableStatus($conn, $tableNo, $action);
	
						   }
						   
						   
						   function updateTableStatus($conn, $tableNo, $status){
							    if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = " UPDATE tbl SET status = '" . $status . "' WHERE tableno = '" . $tableNo . "' ";

            if (mysqli_query($conn, $sql)) {
                echo $tableNo . " " . $status . " " . date("h:i:sa") . "<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
							   }
						   
						   
					   
					   ?>
                       
                       
                       
                       
                       
                       

                    </div>


 <table width="100%" border="0" cellspacing="0" cellpadding="2">
                              <tr>
                                <td>Table No</td>
                                <td>Current Status</td>
                                <td>Action</td>
                              </tr>

                    <?php
            
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
                                <td><?php echo $row['tableno'] ?></td>
                                <td>
                              
                                <button    <?php
                                if( $row['status'] == 'RESERVED') {
									echo "class='btn btn-danger'";
									}else  if( $row['status'] == 'VACANT'){
										echo "class='btn btn-success'";
										}
								?>    style="cursor:default"><?php echo $row['status'] ?></button></td>
                                <td><?php if($row['status'] == 'RESERVED'){
									?>
									<a href="smartTable.php?action=VACANT&tableNo=<?php echo $row['tableno'] ?>"><button>VACANT</button></a>
									<?php
									}else if($row['status'] == 'VACANT'){
									?>
									<a href="smartTable.php?action=RESERVED&tableNo=<?php echo $row['tableno'] ?>"><button>RESERVED</button></a>
									<?php
									}else{
									?>
									<a href="smartTable.php?action=off&tableNo=<?php echo $row['tableno'] ?>"><button>Retry-VACANT</button></a>
									<?php
										} ?></td>
                              </tr>

                            <?php
                        }
                    } else {
                        
                    }

                    mysqli_close($conn);
                    ?>

                   
                  </table>
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