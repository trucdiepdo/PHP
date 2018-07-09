<?php
$msg = '';

if (isset($_POST['login']) && !empty($_POST['username'])
    && !empty($_POST['password'])) {
        
        if ($_POST['username'] == 'admin' &&
            $_POST['password'] == '1234') {
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = 'admin';
                
                echo 'Chào mừng: '. $_POST['username'] .'<br>';
                echo 'Click here to <a href = "logout.php" tite = "Logout">Log out</a>.';
            }else {
                echo $msg = 'Wrong username or password. Log In again!';
                header('Refresh: 2; URL = login.php');
            }
    }
    ?>
        
