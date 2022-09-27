<?php 

include("../shared/head.php");
include("../shared/header.php");
include("../function/connection.php");
include("../function/general.php");
if(isset($_GET['add'])){
$id_user=$_GET['add'];
if(isset($_POST['send'])){
    $history = $_POST['history'];
    $pressure = $_POST['pressure'];
    $blood_sugar = $_POST['blood_sugar'];
    $description = $_POST['description'];
    $return = $_POST['return'];

$i="INSERT INTO `informations`(`id`, `history`, `pressure`, `blood_sugar`, `user_id`, `date`, `description`, `return`) VALUES (NULL,'$history','$pressure','$blood_sugar',$id_user,default,'$description',' $return')";
$q_i=mysqli_query($con,$i);
if($q_i){
    go("/");
}


}

}


?>
<main id="main">
<section id="about" class="about">

<div class="container col-md-8">
            <div class="card">
                <h1>Add information</h1>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputPassword1">History</label>
                            <textarea name="history" class="form-control" id="exampleInputPassword1" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">pressure</label>
                            <input type="text" name="pressure"  class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">blood_sugar</label>
                            <input type="text" class="form-control" name="blood_sugar"  id="exampleInputPassword1">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">description</label>
                            <textarea name="description" class="form-control" id="exampleInputPassword1" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">return</label>
                            <input type="text" class="form-control" name="return"  id="exampleInputPassword1">
                        </div>

                        <button type="submit" name="send" class="my_btn btn btn-primary">Submit</button>
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