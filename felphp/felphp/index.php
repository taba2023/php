<?php
    include('includes/bundle.php');
    $cats = get_cats();

    if(isset($_GET['catID'])) {
        $_SESSION['catID'] = $_GET['catID'];
    }
    else {
        $_SESSION['catID'] = 0;
    }
?>
<main class="homeBack" style="text-align: center;">

    <h1 class="h1homeStyle">Select a Category</h1>
    <?php foreach($cats as $cat) : ?>
        <a href="products.php?cat_id=<?php echo $cat['catID']; ?>"
            title="<?php echo $cat['catDesc']; ?>">
            <img class="catIcon" src="<?php echo $cat['catImage']; ?>" />
        </a>
    <?php endforeach; ?>
</main>
<?php
    include('components/footer.php');
?>