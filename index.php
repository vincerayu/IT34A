<?php 
require 'config/config.php';
require 'config/functions.php';

IF (isset ($_SESSION['user_id'])){
    header('Location:'. BASE_URL . '/app/' . $_SESSION['user_role']. '/index.php');
    exit;
}

$error = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $login = trim ($_POST['login']) ?? '';
       $password = $_POST['password'] ?? '';

      
       if($login=== '' || $password=== '' ){
        $error = 'Invalid login credentials';
         logactivity (
           $pdo,
           null,
            $login,
            'login',
             'failed'
        );
       } else {
         if (loginUser($pdo,$login,$password)){
            logactivity(
                $pdo,
                $_SESSION['user_id'],
                $_SESSION['user_email'],
                'login',
                'success'
            );

            header('Location:'. BASE_URL . '/app/' . $_SESSION['user_role']. '/index.php');
        exit;
         }
       }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>
 <?php if ($error): ?>
     <p><?= htmlspecialchars($error) ?></p>
     <?php endif; ?> 
<body>
    <h1>User Login</h1>
    <form method = "POST">
          <label> Username or Email </label>
          <input type="text"
                 name = "login"
                 required
                 >
            <br>
            <label> Password </label>
            <input type = "password"
                   name = "password"
                   required
                 >
            <br>
            <button type = "submit">Sign In </button>
    </form>
</body>
</html>