<?php
echo "
    <nav class='navbar navbar-expand-lg bg-body-tertiary'>
    <div class='container-fluid'>
    <a class='navbar-brand' href='index.php'>HOME</a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNavDropdown' aria-controls='navbarNavDropdown' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNavDropdown'>
        <ul class='navbar-nav'>
        <li class='nav-item'>
            <a class='nav-link' href='seniors.php'>Senior Doggos</a>
        </li>
        <li class='nav-item'>
        <a class='nav-link' href='create.php'>Contact Info</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='registration.php'>Sign Up</a>
        </li>";

        if(isset($_SESSION["user"])){
        echo"<li class='nav-item'>
            <a class='nav-link' href='logout.php'>Log Out</a>
        </li>";
        }

        if(isset($_SESSION["adm"])){
            echo"
        <li class='nav-item'>
            <a class='nav-link' href='create.php'>New Pet</a>
        </li>
        <li class='nav-item'>
            <a class='nav-link' href='!!!!!!!!'>Users Log</a>
        </li>
        ";
        }

        echo "</ul>
    </div>
    </div>
    </nav>";
?>