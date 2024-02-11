<?php
    require_once 'dbConnect.php';

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $image = $_POST["image"];
        $gender = $_POST["gender"];
        $breed = $_POST["breed"];
        $color = $_POST["color"];
        $vaccination_status = $_POST["vaccination_status"];
        $location = $_POST["location"];
        $availability = $_POST["availability"];
        
        $sql = "INSERT INTO `pets`(`name`, `color`, `gender`, `age`, `breed`, `image`, `location`, `weight`, `vaccination_status`, `availability`) VALUES ('$name', '$color', '$gender', $age, '$breed', '$image', '$location', $weight, '$vaccination_status', '$availability' WHERE id = $_GET[id]";

        if(mysqli_query($conn, $sql)){
            echo "Created Successfully!";
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
    <?php require_once 'navbar_admin.php' ?>
   
    <form action="" method="post" class="mx-4">
    
    Name:<input type="text" name="name" class="form-control mb-2">
    Age:<input type="number" name="age" class="form-control mb-2">
    Gender:<input type="text" name="gender" class="form-control mb-2">
    Breed:<input type="text" name="breed" class="form-control mb-2">
    Color:<input type="text" name="color" class="form-control mb-2">
    Vaccination:<input type="text" name="vaccination_status" class="form-control mb-2">
    Location:<input type="text" name="location" class="form-control mb-2">
    Adoption Status:<input type="text" name="availability" class="form-control mb-2">
    Image url:<input type="text" name="image" class="form-control mb-2">
        <input type="submit" name="submit" value="Create" class="btn btn-success">
    </form>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>