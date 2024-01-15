

<?php
    include('includes/bundle.php');
    $cartID = 0;

    if(isset($_GET['cart_id'])) {
        $cartID = $_GET['cart_id'];
    }
    $items = get_cart_items($cartID);


    if(isset($_POST['completePurchase']) && isset($_SESSION['session_userID'])) {
        close_cart($cartID);
        header("Location: thankyou.php");
        exit();
    }

    $total = 0; // Inicializa la variable total aquí

?>

<main class="checkoutStyle" style="text-align: center;">
    <h1>Your Cart</h1>
    <table id="checkout">
        <tr>
            <th></th>
            <th>Product:</th>
            <th>Quantity:</th>
            <th>Price:</th>
            <th>Subtotal:</th>
        </tr>
        <?php foreach($items as $item) : ?>
            <tr>
               <td><img class="thumb" src="<?php echo $item['Image']; ?>" alt="image"/></td>
                <td><?php echo $item['Name']; ?></td>
                <td><?php echo $item['Qty']; ?></td>
                <td>$<?php echo $item['Price']; ?></td>
                <?php
                    $subtotal = $item['Qty'] * $item['Price'];
                    $total += $subtotal; 
                ?>
                <td>$<?php echo $subtotal; ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
            <td>$<?php echo $total; ?></td>
        </tr>
    </table>
    
    <form method="POST">
        <button type="submit" name="completePurchase">Complete Purchase</button>
    </form>
</main>

<?php
    include('components/footer.php');
?>
