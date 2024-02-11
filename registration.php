<?php
    require_once 'dbConnect.php';
    require_once 'clean.php';

    if(isset($_POST["register"])){
        $first_name = clean($_POST["first_name"]);
        $last_name = clean($_POST["last_name"]);
        $address = clean($_POST["address"]);
        $phone_number = clean($_POST["phone_number"]);
        $email = clean($_POST["email"]);
        $password = clean($_POST["password"]);
        
        $error = false;

        if(empty($first_name)){
            $error = true;
            $fnameError = "You cannot leave this part empty!";
        } else{
            $sql = "SELECT * FROM `users` WHERE first_name = '$first_name'";
            $result = mysqli_query($conn, $sql);
        }

        if(empty($last_name)){
            $error = true;
            $lnameError = "You cannot leave this part empty!";
        } else{
            $sql = "SELECT * FROM `users` WHERE last_name = '$last_name'";
            $result = mysqli_query($conn, $sql);
        }

        if(empty($email)){
            $error = true;
            $emailError = "You cannot leave this part empty!";
        } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = true;
            $emailError = "Check again!";
        } else{
            $sql = "SELECT * FROM `users` WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) !== 0){
                $error = true;
                $emailError = "This email is already registered.";    
            }
        }

        if(empty($password)){
            $error = true;
            $passError = "You cannot leave this part empty!";
        }

        if($error === false){
            $password = hash("sha256", $password);

            $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `phone_number`, `address`, `password`, `status`) VALUES ('$first_name', '$last_name', '$email', '$phone_number', '$address', '$password', 'user')";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo"
                <div class='alert alert-success' role='alert'>
                You have registered successfully!
                </div>";
            }else{
                echo"<div class='alert alert-danger' role='alert'>
                Something went wrong!
                </div>";
            }
        }
    }

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
    <?php require_once 'navbar.php' ?>

<div class="container">
    <h3 class="h2" style="color: brown">Register here</h3>
    <form action="" method="post">
    <div class="row">
            <div style="color: brown">
                <div class="form-group h4">
                    <label for="first_name">First Name:</label>
                </div>
                <div class="form-group h4">
                    <label for="last_name">Last Name:</label>
                </div>
                <div class="form-group h4">
                    <label for="phone_number">Phone Number:</label>
                </div>
                <div class="form-group h4">
                    <label for="address">Address:</label>
                </div>
                <div class="form-group h4">
                    <label for="email">Email:</label>
                </div>
                <div class="form-group h4">
                    <label for="password">Password:</label>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <input type="text" class="form-control" name="first_name">
                <span><?= $fnameError; ?></span>    
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name">
                    <span><?= $lnameError; ?></span> 
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="phone_number">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email">
                    <span><?= $emailError; ?></span> 
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password">
                    <span><?= $passError; ?></span> 
                </div>
            </div>
        </div>
        <input type="submit" value="Register" name="register" class="btn btn-primary">
    </form>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>