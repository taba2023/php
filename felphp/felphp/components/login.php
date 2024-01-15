
<?php


if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $loggedIn = login($user, $pass);
    $result = $loggedIn->fetch();

    if ($result) {
        $userID = $result[0];
        $username = $result[1];
        $_SESSION['session_userID'] = $userID;
        $_SESSION['session_username'] = $username;
    }
}
?>

<div id="login">
    <?php
    if (isset($_SESSION['session_username'])) {
        echo "<p id='welcomeMessage'>Welcome Back " . $_SESSION['session_username'] . "</p>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='logout'>";
        echo "<button class='logButton' type='submit'>logout</button><br/>";
        echo "</form>";
    } else {
        echo "<form method='POST'>";
        echo "<input type='text' id='username' name='username' placeholder='username' required>";
        echo "<input type='password' name='password' placeholder='password' required><br/>";
        echo "<button class='logButton' type='submit'>login</button><br/>";
        echo "</form>";
        echo "<a id='signupLink' href='signup.php' title='signup'>signup</a>";
    }
    ?>
</div>
