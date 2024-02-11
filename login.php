<?php
    session_start();
    require_once 'dbConnect.php';
    require_once 'clean.php';

    if (isset($_SESSION["user"])) {
        echo $_SESSION["user"];
    } else {
        echo "no user";
    }

    if(isset($_POST["login"])){
        $email = clean($_POST["email"]);
        $password = clean($_POST["password"]);
        
        $error = false;

        if (empty($email)) {
            $error = true;
            $emailError = "You cannot leave this part empty!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $emailError = "Check your email again!";
        }

        if (empty($password)) {
            $error = true;
            $passError = "You cannot leave this part empty!";
        }

        if (!$error) {
            $password = hash("sha256", $password);

            $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row["status"] === "user") {
                    $_SESSION["user"] = $row["user_id"];
                    header("Location: index_user.php");
                } elseif ($row["status"] === "adm") {
                    $_SESSION["adm"] = $row["user_id"];
                    header("Location: index_admin.php");
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                Something went wrong!
                </div>";
            }
        }
    }
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php require_once 'navbar_user.php' ?>

<div class="container">
    <h3 class="h2" style="color: brown">Log in to your account</h3>
    <form action="" method="post">
    <div class="row">
            <div style="color: brown">
                <div class="form-group h4">
                    <label for="email">Email:</label>
                </div>
                <div class="form-group h4">
                    <label for="password">Password:</label>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password"> 
                </div>
            </div>
        </div>
        <input type="submit" value="Log in" name="login" class="btn btn-primary">
    </form>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>