<?php
    require('includes/bundle.php');
    if(isset($_POST['username'])) { // $_POST lives on the server
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        create_user($username, $password, $email); // call create_user
        header('Location: index.php'); // redirect to index.php
        exit();
    }
?>
    <main class="singupBack" style="text-align: center;">
        <h1 class="signH1">Welcome to Digital Tech Zone</h1>
        <div id="signup">
            <form method="POST">
                <input type="text" name="username" placeholder="username" required><br/>
                <input type="password" name="password" placeholder="password" required><br/>
                <input type="email" name="email" placeholder="email address" required><br/>
                <button class="signButton">Create New Account</button>
            </form>
        </div>
    </main>
<?php
    include('components/footer.php');
?>