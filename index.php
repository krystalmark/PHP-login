<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('https://images.unsplash.com/photo-1591644302233-574b796e9d8f?q=80&w=1332&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'); /* Add the path to your background image */
            background-size: cover;
            background-position: center;
            text-align: center;
            margin: 0;
            padding: 50px;
        }

        h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            padding: 8px 16px;
            background-color: #337ab7;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: #23527c; 
        }

        .welcome-message {
            font-size: 24px;
            margin-bottom: 20px;
            color: #fff; 
        }

        .user-email {
            font-weight: bold;
            color: #337ab7; 
        }

        .logout-link {
            text-decoration: none;
            padding: 8px 16px;
            background-color: #337ab7;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .logout-link:hover {
            background-color: #23527c; 
        }
    </style>
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
        <div class="welcome-message">
            Welcome, <span class="user-email"><?= $user['email']; ?></span><br>
            You are Successfully Logged In
        </div>
        <a href="logout.php" class="logout-link">Logout</a>
    <?php else: ?>
        <h1 style="color: white;">Please Login or SignUp</h1>
        <a href="login.php" class="btn btn-primary">Login</a> or
        <a href="signup.php" class="btn btn-secondary">SignUp</a>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
