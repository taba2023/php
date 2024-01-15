<?php
    include('includes/bundle.php');
?>
<main class="imageMain">
    <h1 class="h1Style">Contact</h1>
    <div class="container">
    <form method="post" action="process_contact.php">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>

        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>

        <button type="submit">Submit</button>
    </form>
</div>
</main>
<?php
    include('components/footer.php');
?>