<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$id = $_GET['id'];
$itemid = $_POST['itemid'];
$itemName = $_POST['itemName'];
$qty = $_POST['qty'];
$price = $_POST['price'];

if (!isset($_SESSION['cart_items'])) {
    $itemArray = array();
    $_SESSION['cart_items'] = $itemArray;
    $_SESSION['total_price'] = 0;
}




$fid = isDuplicate($id);
if ($fid >= 0) {
    //remove exsisting item form the session array
    $itemArray = $_SESSION['cart_items'];
    unset($itemArray[$id]); //remove index
    $itemArray2 = array_values($itemArray); //reindex array
    $_SESSION['cart_items'] = $itemArray2;
}


$movie = array("id" => $id, "name" => $itemName, "qty" => $qty, "price" => $price, "itemid" => $itemid);

$total = $_SESSION['total_price'];
$priceForMove = $qty * $price;
$_SESSION['total_price'] = $total + $priceForMove;


$itemArray = $_SESSION['cart_items']; //get available array items from the session 
array_push($itemArray, $movie); //push $movie array element into $itemArray
$_SESSION['cart_items'] = $itemArray;

//this will shows how the elements store in the multidemantional array         
//print_r($itemArray);



//header("Location:foodOrder.php");
echo '<script type="text/javascript">';
echo 'window.location.href="foodOrder.php";';
echo '</script>';

function isDuplicate($id) {
    $fid = -1;
    //is same movie selected
    $itemArray = $_SESSION['cart_items'];
    $itemArraylength = count($itemArray);

    for ($x = 0; $x < $itemArraylength; $x++) {

        if ($id == $itemArray[$x]["id"]) {

            //rearrage total for substract from the total 
            $itemPrice = $itemArray[$x]["qty"] * $itemArray[$x]["price"];
            $newTotal = $_SESSION['total_price'] - $itemPrice;
            $_SESSION['total_price'] = $newTotal;

            return $x;
        }
    }
    return $fid;
}

?>
