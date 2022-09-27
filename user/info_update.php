<?php

include("../shared/head.php");
include("../shared/header.php");
include("../function/connection.php");
include("../function/general.php");

if (isset($_GET['update'])) {

    $id = $_GET['update'];
    $s = "SELECT * FROM `informations` where id= $id";
    $s_q = mysqli_query($con, $s);
    $row = mysqli_fetch_assoc($s_q);

    if (isset($_POST['update'])) {

        $history = $_POST['history'];
        $pressure = $_POST['pressure'];
        $blood_sugar = $_POST['blood_sugar'];
        $description = $_POST['description'];
        $return = $_POST['return'];

        $up = "UPDATE `informations` SET `history`='$history',`pressure`='$pressure',`blood_sugar`='$blood_sugar',`description`='$description',`return`='$return' WHERE id=$id";
        $q_up = mysqli_query($con, $up);
        if ($q_up) {
            go("/user/info_update.php?update=$id");
        }
    }
}



?>

<main id="main">
    <section id="about" class="about">
        <div class="container col-md-8">
            <div class="card">
                <h1>update information</h1>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputPassword1">History</label>

                                    <textarea  class="form-control" name="history"  id="exampleInputPassword1" cols="30" rows="10"><?= $row['history'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">pressure</label>
                            <input type="text" name="pressure" value="<?= $row['pressure'] ?>" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">blood_sugar</label>
                            <input type="text" class="form-control" name="blood_sugar" value="<?= $row['blood_sugar'] ?>" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">description</label>
                            <textarea class="form-control" name="description" id="exampleInputPassword1" cols="30" rows="10"><?= $row['description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">return</label>
                            <input type="text" class="form-control" name="return" value="<?= $row['return'] ?>" id="exampleInputPassword1">
                        </div>

                        <button type="submit" name="update" class="my_btn btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>







    </section>
</main>







<?php

include("../shared/footer.php");
include("../shared/script.php");




?>