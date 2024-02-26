<?php
    require "config/app.php";
    require "config/database.php";

    $pets = getAllPets($conx);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Pets</title>
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
        <section class="module">
            <h1>Module pets</h1>
            <a class="add" href="add.php">
                <img src="<?php echo URLIMGS . "/ico-add.svg" ?>" width="30px" alt="Add">
                Add Pet
            </a>
            <table>
                <tbody>
                <?php foreach($pets as $pet): ?>
                    <tr>
                        <td>
                            <img src="<?php echo URLIMGS . "/" . $pet['photo'] ?>" alt="Pet">
                        </td>
                        <td>
                            <span><?php echo $pet['name'] ?></span>
                            <span><?php echo $pet['kind'] ?></span>
                        </td>
                        <td>
                            <a href="show.php?id=<?=$pet['id']?>" class="show">
                                <img src="<?php echo URLIMGS . "/ico-show.svg" ?>" alt="Show">
                            </a>
                            <a href="edit.php?id=<?=$pet['id']?>" class="edit">
                                <img src="<?php echo URLIMGS . "/ico-edit.svg" ?>" alt="Edit">
                            </a>
                            <a href="javascript:;" class="delete" data-id="<?=$pet['id']?>">
                                <img src="<?php echo URLIMGS . "/ico-delete.svg" ?>" alt="Delete">
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
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

            $('body').on('click', '.delete', function () {
                $id = $(this).attr('data-id')
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#1f7a8c",
                    cancelButtonColor: "#1f7a8c",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.replace('delete.php?id=' + $id)
                    }
                })
            })
        })
    </script>
</body>
</html>
