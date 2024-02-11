<?php
    require_once 'dbConnect.php';
    
$profilePicPath = 'assets/icon.jpg';
$sql = "INSERT INTO `users` (`picture`) VALUES ('$picture')";
$user['picture'] = $row['picture'];

if ($_FILES['picture']['error'] == 0) {
    $targetDir = 'assets/';
    $targetFile = $targetDir . basename($_FILES['picture']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES['picture']['tmp_name']);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    if ($_FILES['profile_pic']['size'] > 500000) {
        echo 'Sorry, your file is too large.';
        $uploadOk = 0;
    }

    if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
        echo 'Sorry, only JPG, JPEG and PNG files are allowed.';
        $uploadOk = 0;
    }

    if ($uploadOk) {
        move_uploaded_file($_FILES['picture']['tmp_name'], $targetFile);
        $profilePicPath = $targetFile;
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
    
    <img src="<?php echo isset($user['picture']) ? $user['picture'] : 'assets/icon.jpg'; ?>" alt="Profile Picture">
    <label for="picture">Profile Picture:</label>
    <input type="file" name="picture">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.8/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>