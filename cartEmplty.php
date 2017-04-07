<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

unset($_SESSION['cart_items']);
//header("Location:foodOrder.php");
echo '<script type="text/javascript">';
echo 'window.location.href="foodOrder.php";';
echo '</script>';

?>