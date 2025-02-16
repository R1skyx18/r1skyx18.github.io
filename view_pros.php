<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Book Store</title>
</head>
<?php

session_start();
if (!($_SESSION["uname"]))
    header('location: index.php');
else
    echo "welcom :" . $_SESSION["uname"];

?>

<?php
    $con = mysqli_connect('localhost', 'root', '') or die("No Connection!!");
    mysqli_select_db($con, "test");
    if (isset($_GET["s1"])) {
        $pno = $_GET["pno"];
        $pname = $_GET["pn"];
        $q1 = "insert into pros values($pno,'$pname');";
        mysqli_query($con, $q1) or die("Primary key.....");
    }


    ?>

<body>
    <section class="main">
        <nav>
            <!--header-->
            <div class="nav-bar">
                <i class="fa-solid fa-bars sidebarOpen"></i>
                <div class="logo">
                    <img src="image/logo.png">
                </div>
                <div class="menu">
                    <div class="logo-toggle">
                        <span class="menu-logo"><a href="#">bookStore</a></span>
                        <i class="fa-solid fa-x sidebarClose"></i>
                    </div>

                    <ul class="nav-links">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="view_emp.php">View Employees</a></li>
                        <li><a href="view_pros.php">View Projects</a></li>
                        <li><a href="view_emp_project.php">View Employees Projects</a></li>
                        <li><a href="add_emp.php">Add Employee</a></li>
                        <li><a href="add_pros.php">Add Projects</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <div class="social_icon">
                    <div class="search-container">
                        <i class="fa-solid fa-magnifying-glass search-icon"></i>
                        <i class="fa-solid fa-heart"></i>
                        <div class="message" id="message">welcome: <?php echo $_SESSION["uname"]; ?></div>
                        <!-- <i class="fa-solid fa-right-to-bracket login-btn"></i> -->
                    </div>
                </div>
            </div>
        </nav>
        <!--script-->
        <script>
            /*===variable declarations===*/
            body = document.querySelector("body"),
                nav = document.querySelector("nav"),
                sidebarOpen = document.querySelector(".sidebarOpen"),
                sidebarClose = document.querySelector(".sidebarClose");
            /*===listener open===*/
            sidebarOpen.addEventListener("click", () => {
                nav.classList.add("active");
            });
            /*===listener close===*/
            body.addEventListener("click", e => {
                let clickedElm = e.target;
                if (!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")) {
                    nav.classList.remove("active");
                }
            });
        </script>
        <!--==========-->

        <!--search-->
        <div id="popup" class="popup">
            <div class="popup-search">
                <h1>BOOK STORE</h1>
                <i class="fa-solid fa-x close" id="close"></i>
                <input type="text" id="search-bar" placeholder="Search here...">
                <button id="search-button">Search</button>
                <div class="message" id="message"></div>
            </div>
        </div>
        <div class="admin-popup">
            <form class="admin-form" method="get">
                <h1>Project Number</h1>
                <input type="number" name="pno">
                <h1>Project Name</h1>
                <input type="text" name="pn">
                <input class="button" type="submit" name="s1" value="add ">
                <input class="button" type="submit" name="s2" value="view departments"></td>
                <a class="message" href="admin.php">Go to the main page</a>
                </from>
                <?php 
                if (isset($_GET["s2"])) {
                    $q2 = "select * from pros limit 4;";
                    $q21 = mysqli_query($con, $q2);
                    while ($r = mysqli_fetch_array($q21))
                        echo $r[0] . " " . $r[1] . "<br>";
                }
                ?>
        </div>

    </section>


</body>

</html>