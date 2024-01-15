<?php
    // creates a new cart
    function create_cart($userID) {
        global $db;
        $query = "INSERT INTO cart (cartID, userID) VALUES (NULL, '$userID')";
        $result = $db -> query($query);
        return $result;
    } // end create_cart

    // checks for an active cart for the logged in User
    function active_cart($userID) {
        global $db;
        $query = "SELECT * FROM cart WHERE userID='$userID' AND status='A'";
        $result = $db -> query($query);
        return $result;
    } // end login

     
  // close the cart - customer has clicked on the checkout button
    // NOT COMPLETED!!! FIX!!
    function close_cart($cartID) {
        global $db;
        $query = "UPDATE cart SET status = 'C' WHERE cartID='$cartID'";
        $db -> query($query);
        
    } // end login
?>