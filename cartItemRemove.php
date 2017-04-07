<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
$id = $_GET['id'];
echo $id;
$itemArray = $_SESSION['cart_items'];


//total price remake
$itemPrice = $itemArray[$id]["qty"] * $itemArray[$id]["price"];
$newTotal = $_SESSION['total_price'] - $itemPrice;
$_SESSION['total_price'] = $newTotal;


unset($itemArray[$id]); //remove index
$itemArray2 = array_values($itemArray); //reindex 
//is cart empty then remove cart_session variable
$itemArraylength = count($itemArray2);
$_SESSION['cart_items'] = $itemArray2;
if ($itemArraylength == 0) {
    unset($_SESSION['cart_items']);
}


//header("Location:foodOrder.php");
echo '<script type="text/javascript">';
echo 'window.location.href="foodOrder.php";';
echo '</script>';
?>