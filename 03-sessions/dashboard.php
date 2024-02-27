<?php
    require "config/app.php";
    require "config/database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo URLCSS . "/master.css" ?>">
</head>
<body>
<main>
        <header class="nav level-0">
            <a href="">
                <img src="<?php echo URLIMGS . "/ico-back.svg" ?>" alt="Back">
            </a>
            <img src="<?php echo URLIMGS . "/logo.svg" ?>" alt="Logo">
            <a href="" class="mburger">
                <img src="<?php echo URLIMGS . "/mburger.svg" ?>" alt="Menu Burger">
            </a>
        </header>
        <section class="dashboard">
            <h1>Dashboard</h1>
            <menu>
                <ul>
                    <li>
                        <a href="#">
                            <img src="<?php echo URLIMGS . "/ico-users.svg" ?>" alt="Users">
                            <span>Module User</span>    
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo URLIMGS . "/ico-pets.svg" ?>" alt="Pets">
                            <span>Module Pets</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="<?php echo URLIMGS . "/ico-adoptions.svg" ?>" alt="Adoptions">
                            <span>Module Adoptions</span>
                        </a>
                    </li>
                </ul>
            </menu>
        </section>
    </main>
    <script src="<?php echo URLJS . "/sweetalert2.js" ?>"></script>
    <script src="<?php echo URLJS . "/jquery-3.7.1.min.js" ?>"></script>
    <script>
        $(document).ready(function () {
            <?php if(isset($_SESSION['msg'])): ?>
                Swal.fire({
                    position: "top-end",
                    title: "Congratulations!",
                    text: "<?php echo $_SESSION['msg'] ?>",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 5000
                })
                <?php unset($_SESSION['msg']) ?>
            <?php endif ?>
        })
    </script>
</body>
</html>
