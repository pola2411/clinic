<?php 

include("../shared/head.php");
include("../shared/header.php");
include("../function/connection.php");
include("../function/general.php");


if(isset($_GET['add'])){
    $id_user=$_GET['add'];

    $s="SELECT * FROM `analysis_pictures` WHERE user_id=$id_user";
    $q_s=mysqli_query($con,$s);


    if(isset($_POST['send'])){
        $image_name=time(). $_FILES['image']['name'];
        $image_tmp=$_FILES['image']['tmp_name'];
        $location="./upload/";
        move_uploaded_file($image_tmp,$location.$image_name);

        $i="INSERT INTO `analysis_pictures`(`id`, `image`, `user_id`, `date`) VALUES (NULL,'$image_name',$id_user,default)";
        $q_s=mysqli_query($con,$i);
        if($q_s){
            go("user/show.php?show=$id_user");
        }

    }
}     


?>



<main id="main">
  <section id="about" class="about">
    <div class="container col-md-8">
      <div class="card ">
        <h1>Add New analysis_image</h1>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="exampleInputEmail1">image</label>
              <input type="file" class="form-control" name="image" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            
            <button type="submit" name="send" class="my_btn btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div class="line"></div>
    <div class="container">
        <div class="row">
        <?php  foreach($q_s as $data){ ?>
        <div class="card col-md-6 clinic_card">
            <h2><?= $data['date'] ?></h2>
  <img src="/clinic/user/upload/<?= $data['image'] ?>" class="card-img-top" alt="...">
 
</div>
<?php } ?>
        </div>
    </div>



  </section>

</main>






<?php 

include("../shared/footer.php");
include("../shared/script.php");




?>