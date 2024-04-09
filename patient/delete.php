<?php
/**
 * Created by PhpStorm.
 * User: mehedi
 * Date: 8/11/2020
 * Time: 6:07 PM
 */

    require_once '../php/config.php';

    if (isset($_GET['delete_medicine'])){
        $delete_medicine = $_GET['delete_medicine'];

        $cart_delete = "DELETE FROM medicine_buy WHERE medicine_sell_id = $delete_medicine";
        $result_delete = mysqli_query($connect, $cart_delete);

        header('Location: cart.php');
    }