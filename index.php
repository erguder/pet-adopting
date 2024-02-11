<?php
    require_once 'dbConnect.php';

    $sql = "SELECT * FROM `pets`";
    $result = mysqli_query($conn, $sql);
    $cards = "";

    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $cards .="
            <div class='card' style='width: 18rem;'>
            <img src='$row[image]' class='card-img-top' alt='$row[color] $row[breed]'>
            <div class='card-body'>
            <h5 class='card-title'>$row[name]</h5>
            <p class='card-text'>Age: $row[age]</p>
            <p class='card-text'>Gender $row[gender]</p>
            <p class='card-text'>Breed: $row[breed]</p>
            <p class='card-text'>Color: $row[color]</p>
            </div>
            </div>
            ";


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
    <?php require_once 'navbar.php' ?>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
            <?= $cards ?>

        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>