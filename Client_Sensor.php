<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="10">
        <title></title>
    </head>
    <body>
        <?php
        include_once './_function.php';

        $conn = getDBConnection();

// fictional URL to an existing file with no data in it (ie. 0 byte file)
        $curl = curl_init();

//SLOT-1
        $url = 'http://localhost:81/ERest/Sensor.php';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $str = curl_exec($curl);
        updateSensorStatus($conn, 1, $str);

//SLOT-2
        $url = 'http://localhost:81/ERest/Sensor.php';
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $str = curl_exec($curl);
        updateSensorStatus($conn, 2, $str);

        
        
//ENDING        
        echo $str;
        curl_close($curl);

// the value of $str is actually bool(true), not empty string ''
// var_dump($str);


        mysqli_close($conn);

        function updateSensorStatus($conn, $sid, $status) {


            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = " UPDATE slot SET STATUS = '" . $status . "' WHERE slotno = '" . $sid . "' ";

            if (mysqli_query($conn, $sql)) {
                echo $sid . " " . $status . " " . date("h:i:sa") . "<br>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>
    </body>
</html>

