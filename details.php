<?php
    require_once 'dbConnect.php';

    $sql = "SELECT * FROM `pets` WHERE id = $_GET[id]";
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_assoc($result);
   
    $card ="
    <div class='card' style='width: 28rem;'>
            <img src='$row[image]' class='card-img-top' width='28rem' alt='$row[color] $row[breed]'>
            <div class='card-body'>
            <h5 class='card-title'>$row[name]</h5>
            <p class='card-text'>Age: $row[age]</p>
            <p class='card-text'>Gender $row[gender]</p>
            <p class='card-text'>Breed: $row[breed]</p>
            <p class='card-text'>Color: $row[color]</p>
            <p class='card-text'>Vaccination: $row[vaccination_status]</p>
            <p class='card-text'>Location: $row[location]</p>
            <p class='card-text'>Adoption Status: $row[availability]</p>
            </div>
            </div>
    ";
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
    <?php require_once 'navbar.php' ?>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
            <?= $card ?>

        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>