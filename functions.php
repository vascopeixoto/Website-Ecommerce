<?php

use \vasco\Model\User;
use \vasco\Model\Cart;

function formatPrice($vlprice){
    
    return number_format($vlprice, 2, ",", ".");
}

function format_date($date){
    
    return date('d/m/Y', strtotime($date));
}

function checkLogin($inadmin = true)
{
    return User::checkLogin($inadmin);
}

function getUserName()
{
    $user= User::getFromSession();
    return $user->getdesperson();
}

function getCartNrQtd(){
    $cart = Cart::getFromSession();
    $totals= $cart->getProductsTotals();
    return $totals['nrqtd'];
}

function getCartTotal(){
    $cart = Cart::getFromSession();
    $totals= $cart-> getProductsTotals();
    return formatPrice($totals['vlprice']);
}
?>