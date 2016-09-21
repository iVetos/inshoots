<?php
$smarty->assign('title', 'Products');

if(Cart::returnCount()){
    //dump(Cart::returnCart());
    $smarty->assign('products', Cart::returnCart());

    $smarty->display('header.tpl');
    $smarty->display('cart.tpl');
}
else {
    redirect('/');
}
