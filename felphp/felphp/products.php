<?php
    include('includes/bundle.php');

      // get current category
      if(isset($_GET['cat_id'])) {
        $category_id = $_GET['cat_id'];
        $_SESSION['cat_ID'] = $category_id;
    }
    else {
        $category_id = 1;
        $_SESSION['cat_ID'] = $category_id;
    }
    
    $category_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : 1;

    
    
    $products = get_products_by_cat($category_id);

    
    if(isset($_POST['productID']) && isset($_SESSION['session_userID'])) {
        $productID = $_POST['productID'];
        $qty = $_POST['qty'];
        // check for cart
        $has_cart = active_cart($_SESSION['session_userID']);
        $result = $has_cart -> fetch();

        if($result) { // user has an active cart
           
            $cartID = $result[0]; // set cartID
            add_item($cartID, $productID, $qty);
        }
        else { 

            create_cart($_SESSION['session_userID']);
            // add new item with the new cartID
            $has_cart = active_cart($_SESSION['session_userID']);
            $result = $has_cart -> fetch();
            if($result) {
                // if user has an active cart
                // adding a new item with that cartID
                $cartID = $result[0]; // set cartID
                add_item($cartID, $productID, $qty);
            }
        }
        header("Location: products.php?cat_id=". $_SESSION['cat_ID']);
        exit();
        
    } // add product if
    else if(isset($_POST['productID'])) {
        echo "<input id='loginError' type='hidden' name='loginError'>";
    }
    
?>
     


<main class="backProducts">

    <?php foreach($products as $p) : ?>
        
        <div class="productCard">
            <div class="productImages">
            <img class="productImages" src="<?php echo $p['productImage']; ?>" 
            alt="<?php echo $p['productDesc']; ?>" />

            </div>
            <div class="productInfo">
                <h2><?php echo $p['productName']; ?> $<?php echo $p['productPrice']; ?></h2>
                <p class="proDescp"><?php echo $p['productDesc']; ?></p>
                <form method="POST">
                    <input class="productQty" type="number" name="qty" value="1" max="12" min="1" />
                    <input type="hidden" name="productID" value="<?php echo $p['productID']; ?>" />
                    <button type="submit" class="cartButton">Add to Cart</button>
                </form>
            </div>
        </div>
        
    <?php endforeach; ?>
    
</main>





<?php
    include('components/footer.php');
?>