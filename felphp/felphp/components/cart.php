<?php
    $count = 0;
    $cartID = 0;
    // is the user logged in?
    if(isset($_SESSION['session_userID'])) {
        $has_cart = active_cart($_SESSION['session_userID']); // cart_model.php
        $result = $has_cart -> fetch();

        if($result) { // user has a cart
            $cartID = $result[0]; // set cartID
            $count = item_count($cartID); // item_model.php
        }
    }
    else {
        // do nothing
    }
?>
<div id="cart">
         <a id="cartLink" href="checkout.php?cart_id=<?php echo $cartID ?>">
        <?php echo $count; ?>
         </a>
</div>