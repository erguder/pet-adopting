<?php
    require_once 'dbConnect.php';

    $sql = "SELECT * FROM `pets` WHERE id = $_GET[id]";
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_assoc($result);

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $image = $_POST["image"];
        $gender = $_POST["gender"];
        $breed = $_POST["breed"];
        $color = $_POST["color"];
        $vaccination_status = $_POST["vaccination_status"];
        $location = $_POST["location"];
        $availability = $_POST["availability"];
        
        $sql = "UPDATE `pets` SET `name`='$name',`color`='$color',`gender`='$gender',`age`='$age',`breed`='$breed',`image`='$image',`location`='$location',`weight`='$weight',`vaccination_status`='$vaccination_status',`availability`='$availability' WHERE id = $_GET[id]";

        if(mysqli_query($conn, $sql)){
            echo "Updated Successfully!";
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
    
    Name:<input type="text" name="name" class="form-control mb-2" value="<?= $row["name"];?>">
    Age:<input type="number" name="age" class="form-control mb-2" value="<?= $row["age"];?>">
    Gender:<input type="text" name="gender" class="form-control mb-2" value="<?= $row["gender"];?>">
    Breed:<input type="text" name="breed" class="form-control mb-2" value="<?= $row["breed"]; ?>">
    Color:<input type="text" name="color" class="form-control mb-2" value="<?= $row["color"]; ?>">
    Vaccination:<input type="text" name="vaccination_status" class="form-control mb-2" value="<?= $row["vaccination_status"];?>">
    Location:<input type="text" name="location" class="form-control mb-2" value="<?= $row["location"];?>">
    Adoption Status:<input type="text" name="availability" class="form-control mb-2" value="<?= $row["availability"];?>">
    Image url:<input type="text" name="image" class="form-control mb-2" value="<?= $row["image"]; ?>">
        <input type="submit" name="submit" value="Update" class="btn btn-success">
    </form>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>